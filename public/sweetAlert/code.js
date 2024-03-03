$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Silme işlemi için Emin misiniz?',
                    text: "Bu işlem Geri Alınamaz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Hayır Silme!',
                    confirmButtonText: 'Evet Sil!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'İşlem Başarıyla Gerçekleşti!',
                        'Dosya Silindi.',
                        'success'
                      )
                    }
                  })


    });

  });
