const gambar = document.getElementsByClassName('gambar')[0];
const file = document.getElementsByClassName('file')[0];

file.addEventListener('change', function(){
    gambar.src = URL.createObjectURL(file.files[0]);
});