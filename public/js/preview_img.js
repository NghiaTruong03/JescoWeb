
validatedCustomFile.onchange = evt => {
    const [file] = validatedCustomFile.files
    if (file) {
      previewImage.src = URL.createObjectURL(file);
      document.getElementById("new_image_label").textContent="Ảnh mới:";
    }
  }

  