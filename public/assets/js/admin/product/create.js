const preview = (file) => {
    const img = document.createElement("img");
    img.src = URL.createObjectURL(file);  // Object Blob
    img.alt = file.name;
    img.className = "w-full h-full";
    document.querySelector('#preview').innerHTML = '';
    document.querySelector('#preview').append(img);
  };
  
  document.querySelector("#files").addEventListener("change", (ev) => {
    if (!ev.target.files) return; // Do nothing.
    [...ev.target.files].forEach(preview);
  });