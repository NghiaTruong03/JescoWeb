<?php
//admin
use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttrController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderManageController;
use App\Http\Controllers\Admin\BlogManageController;
use App\Http\Controllers\Admin\CouponController;


//shop
use App\Http\Controllers\Shop_pages\HomePageController;
use App\Http\Controllers\Shop_pages\UserController;
use App\Http\Controllers\Shop_pages\CartController;
use App\Http\Controllers\Shop_pages\OrderController;
use App\Http\Controllers\Shop_pages\WishlistController;
use App\Http\Controllers\Shop_pages\BlogController;
use App\Http\Controllers\Shop_pages\Controller;

//<--Admin
Route::get('admin_login', [HomeController::class, 'login'])->name('admin.login');
Route::post('admin_login', [HomeController::class, 'postLogin']);
Route::get('logout', [HomeController::class, 'logout'])->name('logout');


Route::middleware(['admin'])->prefix('admin')->group(function () {
    //Dashboard     
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');

    //Quan li danh muc
    Route::resource('category', CategoryController::class);

    //Quan li thuoc tinh
    Route::resource('attr', AttrController::class);
    Route::post('attr-value-add', [AttrController::class, 'addValue'])->name('attr.addValue');

    //Quan li nhan hieu
    Route::resource('brand', BrandController::class);

    //Quan li tai khoan
    Route::get('account', [AccountController::class, 'index'])->name('account.index');

    //Quan ly banner
    Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('banner/create', [BannerController::class, 'addBanner']);
    Route::get('banner/viewBanner/{id}', [BannerController::class, 'viewBanner'])->name('banner.viewBanner');
    Route::get('banner/editBanner/{id}', [BannerController::class, 'editBanner'])->name('banner.editBanner');
    Route::post('banner/editBanner/{id}', [BannerController::class, 'updateBanner'])->name('banner.updateBanner');
    Route::get('banner/deleteBanner/{id}', [BannerController::class, 'deleteBanner'])->name('banner.deleteBanner');

    //Quan ly don hang
    Route::get('order', [OrderManageController::class, 'index'])->name('order.index');
    Route::get('order.detail/{id}', [OrderManageController::class, 'detail'])->name('order.detail');
    Route::post('order.detail/{id}', [OrderManageController::class, 'updateOrder'])->name('order.update');
    Route::get('printInvoice/{id}', [OrderManageController::class,'printInvoice'])->name('invoice.print');

    //Quan ly blog
    Route::get('blog', [BlogManageController::class, 'index'])->name('blog_manage.index');
    Route::get('blog/create', [BlogManageController::class, 'create'])->name('blog_manage.create');
    Route::post('blog/create', [BlogManageController::class, 'store'])->name('blog_manage.store');
    Route::get('blog/viewBlog/{id}', [BlogManageController::class, 'viewBlog'])->name('blog_manage.viewBlog');
    Route::get('blog/edit/{id}', [BlogManageController::class, 'edit'])->name('blog_manage.edit');
    Route::post('blog/edit/{id}', [BlogManageController::class, 'update'])->name('blog_manage.update');
    Route::get('blog/destroy/{id}', [BlogManageController::class, 'destroy'])->name('blog_manage.destroy');

    //Quan ly ma giam gia
    Route::get('coupon', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('coupon/create', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('coupon/create', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('coupon/edit/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('coupon/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');


    


    Route::middleware(['role'])->group(function () {
        //Quan li tai khoan
        //User
        Route::get('account.user', [AccountController::class, 'indexUser'])->name('account.user.index');
        Route::get('account/create', [AccountController::class, 'createStaff'])->name('account.addStaff');
        Route::post('account/create', [AccountController::class, 'storeStaff'])->name('account.storeStaff');
        Route::get('account/edit/user/{id}', [AccountController::class, 'editAccount'])->name('account.edit.user');
        Route::put('account/edit/user/{id}', [AccountController::class, 'updateAccount'])->name('account.update.user');
        Route::get('account/delete/user/{id}', [AccountController::class, 'deleteUserAccount'])->name('account.delete.user');

        //Staff
        Route::get('account.staff', [AccountController::class, 'indexStaff'])->name('account.staff.index');
        Route::get('account/edit/staff/{id}', [AccountController::class, 'editAccount'])->name('account.edit.staff');
        Route::put('account/edit/staff/{id}', [AccountController::class, 'updateAccount'])->name('account.update.staff');
        Route::get('account/delete/staff/{id}', [AccountController::class, 'deleteAccount'])->name('account.delete.staff');
    });



    Route::middleware(['role:' . config('const.ROLE.WAREHOUSE-STAFF') . ',' . config('const.ROLE.MERCHANDISER')])->group(function () {

        //Dashboard
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');

        //nhan vien quan ly kho
        route::middleware(['role:' . config('const.ROLE.WAREHOUSE-STAFF')])->group(function () {
            //Quan li san pham
            Route::resource('product', ProductController::class);

            //Quan li danh muc
            Route::resource('category', CategoryController::class);

            //Quan li nhan hieu
            Route::resource('brand', BrandController::class);

            //Quan li thuoc tinh
            Route::resource('attr', AttrController::class);
            Route::post('attr-value-add', [AttrController::class, 'addValue'])->name('attr.addValue');

            // //Quan ly banner
            // Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
            // Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
            // Route::post('banner/create', [BannerController::class, 'addBanner']);
            // Route::get('banner/editBanner/{id}', [BannerController::class, 'editBanner'])->name('banner.editBanner');
            // Route::post('banner/editBanner/{id}', [BannerController::class, 'updateBanner'])->name('banner.updateBanner');
            // Route::get('banner/deleteBanner/{id}', [BannerController::class, 'deleteBanner'])->name('banner.deleteBanner');
        });

        //nhan vien quan ly don hang
        route::middleware(['role:' . config('const.ROLE.MERCHANDISER')])->group(function () {
            //Quan ly banner
            Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
            Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
            Route::post('banner/create', [BannerController::class, 'addBanner']);
            Route::get('banner/editBanner/{id}', [BannerController::class, 'editBanner'])->name('banner.editBanner');
            Route::post('banner/editBanner/{id}', [BannerController::class, 'updateBanner'])->name('banner.updateBanner');
            Route::get('banner/deleteBanner/{id}', [BannerController::class, 'deleteBanner'])->name('banner.deleteBanner');

            //User
            Route::get('account.user', [AccountController::class, 'indexUser'])->name('account.user.index');
            Route::get('account/create', [AccountController::class, 'createStaff'])->name('account.addStaff');
            Route::post('account/create', [AccountController::class, 'storeStaff'])->name('account.storeStaff');
            Route::get('account/edit/user/{id}', [AccountController::class, 'editAccount'])->name('account.edit.user');
            Route::put('account/edit/user/{id}', [AccountController::class, 'updateAccount'])->name('account.update.user');
            Route::get('account/delete/user/{id}', [AccountController::class, 'deleteAccount'])->name('account.delete.user');
            
            //Quan ly don hang
            Route::get('order', [OrderManageController::class, 'index'])->name('order.index');
            Route::get('order.detail/{id}', [OrderManageController::class, 'detail'])->name('order.detail');
            Route::post('order.detail/{id}', [OrderManageController::class, 'updateOrder'])->name('order.update');
        
            //Quan ly ma giam gia
            Route::get('coupon', [CouponController::class, 'index'])->name('coupon.index');
            Route::get('coupon/create', [CouponController::class, 'create'])->name('coupon.create');
            Route::post('coupon/create', [CouponController::class, 'store'])->name('coupon.store');
            Route::get('coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
            Route::post('coupon/edit/{id}', [CouponController::class, 'update'])->name('coupon.update');
            Route::get('coupon/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');

        });
    });
});
//Admin-->


//<--FE
// cac route khong yeu cau dang nhap
//xem san pham
Route::get('/', [HomePageController::class, 'shopIndex'])->name('shop.index');
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('product.detail/{id}', [HomePageController::class, 'productDetail'])->name('product_detail.show');

//dang nhap/dang ky
Route::get('signin', [UserController::class, 'index'])->name('signin.index');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');

//quen mat khau
Route::get('pass_reset', [UserController::class, 'passReset'])->name('pass_reset');
Route::post('pass_reset', [UserController::class, 'post_passReset']);
Route::get('password_reset', [UserController::class, 'password_reset'])->name('password_reset');
Route::post('password_reset', [UserController::class, 'post_password_reset']);






//xem san pham theo danh muc,tim kiem
route::get('category.select/{id}', [HomePageController::class, 'categoryIndex'])->name('category.select');
route::get('brand.select/{id}', [HomePageController::class, 'brandIndex'])->name('brand.select');
route::get('search', [HomePageController::class, 'getSearch'])->name('search');

//cac route yeu cau dang nhap
Route::middleware(['auth'])->group(function () {
    //route Logout
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    //route Cart
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('cart/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('cart/delete/product/{id}', [CartController::class, 'deleteCartDetail'])->name('cart.delete.product');

    //route Wishlist
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('add_to_wishlist/{id}', [WishlistController::class, 'addWishlist'])->name('add_to_wishlist');
    Route::get('wishlist/delete/product/{id}', [WishlistController::class, 'deleteWishlist'])->name('wishlist.delete.product');

    //route Profile
    Route::get('profile', [UserController::class, 'viewProfile'])->name('user.profile');
    Route::get('profile.update.user/{id}', [UserController::class, 'updateProfile'])->name('profile.update.user');
    Route::post('profile.update.user/{id}', [UserController::class, 'updateProfile'])->name('profile.update.user');
    Route::post('profile.changePassword', [UserController::class, 'changePassword'])->name('profile.changePassword.user');

    //route Checkout
    Route::get('checkout', [OrderController::class, 'create'])->name('order.create');
    // Route::get('checkout.add.order/{id}',[OrderController::class,'store'])->name('checkout.add.order');
    Route::post('checkout.add.order/{id}', [OrderController::class, 'store'])->name('checkout.add.order');
    Route::get('checkout.success', [OrderController::class, 'checkoutSuccess'])->name('checkout.success');

    //route Comment
    Route::get('comment.add/{id}', [HomePageController::class, 'addComment'])->name('comment.add');
    Route::post('comment.add/{id}', [HomePageController::class, 'addComment'])->name('comment.add');
    Route::get('comment.delete/{id}', [HomePageController::class, 'deleteComment'])->name('comment.delete');

    Route::post('/loadComment', [HomePageController::class, 'loadComment'])->name('loadComment');

    //route PaymentMethod
    Route::post('vnpay_payment', [OrderController::class, 'vnpay_payment'])->name('vnpay_payment');
    Route::post('momo_payment', [OrderController::class, 'momo_payment'])->name('momo_payment');

    //route CheckCoupon
    Route::post('check_coupon', [CartController::class,'checkCoupon'])->name('check_coupon');

});


//FE-->
