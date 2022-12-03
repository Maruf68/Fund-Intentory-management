<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    {{-- ajax --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>



    <script>
     //pagination
     $(document).on('click','.pagination a',function(e){

        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1]
        product(page)

     })

     function product(page){
        $.ajax({
            url:"/pagination/paginate-data?page="+page,
            success:function(res){
                $('.table-data').html(res);

            }  
        })
     }




     //Search

     $(document).on('keyup',function(e){
e.preventDefault();
let search_string = $('#search').val();



$.ajax({
    url:"{{url('searchProduct')}}",
    method:'GET',
    data:{search_string:search_string},
    success:function(res){
        $('.table-data').html(res);
        if(res.status=='nothing found'){
            $('.table-data').html('<span class="text-danger">'+' Nothing Found' + ' </span>');
        }
    }
});
})



    </script>