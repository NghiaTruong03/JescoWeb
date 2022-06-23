$(document).ready(function() {
    $('.add-to-cart').on('click', function() {
        let productId = $(this).attr('data-id');
        let url = addCartUrl;
        $.ajax({
            url: url.replace('__id__', productId),
            type: 'GET',
            success: function(res) {
                if (res.status) {
                    $('.toast').toast('show');
                    let quantity = $('#quantity-product-' + res.product_id).data('quantity') + 1;
                    $('#quantity-product-' + res.product_id).data('quantity', quantity)
                    $('#quantity-product-' + res.product_id).text(quantity);
                } else {
                    // alert('Thêm mới thất bại');
                }

            }
        })
    });

    $(function(){
       $('#validate_register, #validate_login,#validate-loginActive').on('submit',function(e){
            e.preventDefault();
            let formId = $(this).attr('id');
            // alert('ok');
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        if (formId == 'validate_register') {
                            $('#validate_register')[0].reset();
                            if(data.msg){
                                alert(data.msg);
                            }
                        }else if(formId == 'validate_login' || formId == 'validate-loginActive'){
                            if(data.msg){
                                alert(data.msg);
                            }
                            window.location.href = "/";
                        }
                        else {
                            window.location.href = "/";
                        }
                        // alert('dfgfg');
                    }
                }
                
            });
       });  
    });
    // $('#cua-dat-hang').on('click', function() {
    //     let form = new FormData(document.getElementById('cua-form'));
    //     $('#loader').removeClass('cua-none');
    //     let url = $('#cua-form').attr('action');
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         data: form,
    //         success: function(res) {
    //             $('#loader').addClass('cua-none');
    //             window.location.replace(cua-route);
    //         }
    //     });
    // });

    // loadComment();

    // function loadComment() {
    //     var product_id = $('.product_id').val();
    //     var _token = $(' input[name= "_token"] ').val();
    //     let url = cua;
    //     $.ajax({
    //         url: url,
    //         method: "POST",
    //         data: { product_id: product_id, _token: _token },
    //         success: function(data) {
    //             $('#comment_show').html(data.cua);
    //         }
    //     })
    // };

    // $('#btn-comment').click(function (ev) {
    //     ev.preventDefault();
    //     let content = $('#comment-content').val();
    //     let _commentnUrl = '{{route("loadComment")}}';
    //     console.log(content);
    //     console.log(_commentnUrl);

    // })
    // $('form-register').on('submit', function(e) {
    //     e.stopPropagation();
    //     // let form2 = $(this).closet('form');
    //     // let form = new FormData(form2);
    //     console.log('sdf'); 
    //     alert('dffgfg');
    
    // });

    $('#payment-form').on('change', 'input,textarea', function() {
        let data = $(this).val()
        let inputName = $(this).attr('name');
        $('#vnpay_form input[name=' + inputName + ']').val(data);
        $('#momo_form input[name=' + inputName + ']').val(data);
        $('#coupon_form input[name=' + inputName + ']').val(data);
    
    
    });
    

});

function requireLogin() {
    alert("Yêu cầu đăng nhập để mua hàng");
}