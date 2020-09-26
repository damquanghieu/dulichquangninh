<script>
    $(document).ready(function() {

        $('.check-all-module').on('click', function(){
           $(this).parents('.role_module').find('.checkbox').prop('checked',$(this).prop('checked'));
        });

        $('.js-example-basic-multiple').select2({
            'placeholder':'Chọn vai trò',
        });

        $('#dataTables-example').DataTable({
            // "responsive": true,
            "language": {
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                "emptyTable": "Không có dữ liệu",
                "search": "Tìm kiếm",
                "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ kết quả",
                "infoEmpty": "Hiển thị 0 kết quả",
                "infoFiltered": "(Lọc từ _MAX_ kết quả)",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Sau",
                    "previous": "Trước"
                },
                "lengthMenu": "Hiện _MENU_ mục",
            }
        });

        $('#check_all').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        // $('#check_all').on('click', function(){
        //         $(this).parents('.test').find('.checkbox').prop('checked',$(this).prop('checked'));
        // });
        //checkAll
        // $('.checkbox').on('click', function() {
        //     if ($('.checkbox:checked').length == $('.checkbox').length) {
        //         $('#check_all').prop('checked', true);
        //     } else {
        //         $('#check_all').prop('checked', false);
        //     }
        // });


        $('.delete-all-category').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                alert("Hãy chọn vào thông tin bạn định xóa");
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    // var strIds = idsArr.join(","); 
                    // console.log(strIds);
                    $.ajax({
                        url: "{{ route('category.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            idsArr: idsArr
                        },
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert(data['message']);
                            }
                        },
                        error: function(data) {
                            alert('Phần tử đã được liên kết, không thể xóa');
                        }
                    });
                }
            }
        });

        $('#delete-all-posts').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                alert("Hãy chọn vào thông tin bạn định xóa");
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('delete-multiple-posts') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert(data['message']);
                            }
                        },
                        error: function(data) {
                            alert('Phần tử đã được liên kết, không thể xóa');
                        }
                    });
                }
            }
        });
        $('#delete-all-slide').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                alert("Hãy chọn vào thông tin bạn định xóa");
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('delete-multiple-slide') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert(data['message']);
                            }
                        },
                        error: function(data) {
                            alert('Phần tử đã được liên kết, không thể xóa');
                        }
                    });
                }
            }
        });
        $('.delete-all-user').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            console.log(idsArr);
            if (idsArr.length <= 0) {
                alert("Hãy chọn vào thông tin bạn định xóa");
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('user.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert(data['message']);
                            }
                        },
                        error: function(data) {
                            alert(
                                'Bạn phải thay đổi hoặc xóa quyền và group(nếu có) đang áp dụng lên user này'
                            );
                        }
                    });
                }
            }
        });

        $('#delete-all-role').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                alert("Hãy chọn vào thông tin bạn định xóa");
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    $.ajax({
                        url: "{{ route('delete.deleteMultipleRole') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { 
                            'idsArr':idsArr
                            },
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert(data['message']);
                            }
                        },
                        error: function(data) {
                            alert('Phần tử đã được liên kết, không thể xóa');
                        }
                    });
                }
            }
        });
    });
</script>