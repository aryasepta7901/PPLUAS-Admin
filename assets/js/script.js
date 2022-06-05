const flashData = $('.flash-data1').data('flashdata');
if(flashData)
{
// jika ada flash data jalankan sweet alert
Swal.fire({
icon: 'success',
title: 'Success!',
text: flashData,
});
}
const flashData2 = $('.flash-data2').data('flashdata');
if(flashData2)
{
// jika ada flash data jalankan sweet alert
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: flashData2,

});
}
// Tombol-hapus
$('.tombol-hapus').on('click',function(e){
e.preventDefault(); //aksi default matikan->(href matikan)
const href = $(this).attr('href'); //ambil href yang sedang di pencet

Swal.fire({
    title: 'Apakah Anda Yakin?',
    text: "Data  akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'
    }).then((result) => {
    if (result.isConfirmed) {
        // jika memilih tombol hapus data 
        document.location.href =href;
    }
    })
});