$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  const table = $(".data-table").DataTable({
      processing:true,
      serverSide:true,
      ajax:"{{url('crud')}}",
      columns: [
        {data: 'title', name: 'title'},
        {data: 'title', name: 'title'},
        {data: 'author', name: 'author'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  })
})