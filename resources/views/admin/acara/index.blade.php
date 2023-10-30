@extends('admin.layouts.main')

@section('title', 'Acara')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Acara
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table table-vcenter" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="w-1">No</th>
                                    <th>No Booking</th>
                                    <th>Pengantin</th>
                                    <th>Tanggal Acara</th>
                                    <th class="w-1"></th>
                                    <th class="w-1"></th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.acara.index') }}",
                    data: function(d) {
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'booking',
                        name: 'booking',
                    },
                    {
                        data: 'pengantin',
                        name: 'pengantin',
                    },
                    {
                        data: 'tanggal_acara',
                        name: 'tanggal_acara',
                    },
                    {
                        data: 'show',
                        name: 'show',
                        orderable: false,
                        searchable: false,
                        className: "dt-center",
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false,
                        className: "dt-center",
                    },
                    {
                        data: 'destroy',
                        name: 'destroy',
                        orderable: false,
                        searchable: false,
                        className: "dt-center",
                    },
                ],
            });
            $('body').on('click', '.btn-modal-show', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {}, function(data, status) {
                    $('.modal-content').html(data);
                    $('.modal').modal('show');
                });
            });
            $('body').on('submit', '.modal-form', function(event) {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData(form[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('.text_error').text('');
                        $('.btn-submit').attr('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response.failed) {
                            $.each(response.failed, function(key, val) {
                                if (key.indexOf(".") != -1) {
                                    var arr = key.split(".");
                                    name = $("[name='" + arr[0] + "[]']:eq(" + arr[
                                        1] + ")");
                                } else {
                                    var name = $('[name=' + key + ']');
                                }
                                name.parent().append(
                                    '<small class="text-danger text_error">' + val[
                                        0] + '</small>');
                            });
                        } else if (response.success) {
                            table.draw();
                            Swal.fire(
                                'Success',
                                response.success,
                                'success'
                            )
                            $('.modal').modal('hide');
                        }
                        $('.btn-submit').removeAttr('disabled', 'disabled');
                    },
                    error: function(jqXHR, ajaxOptions, thrownError) {
                        $('.btn-submit').removeAttr('disabled', 'disabled');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: thrownError,
                        })
                    }
                });
            });
            $('body').on('click', '.btn-destroy', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Success',
                                        response.success,
                                        'success'
                                    )
                                    table.draw();
                                }
                            },
                            error: function(jqXHR, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: thrownError,
                                })
                            }
                        });
                    }
                })
            });
            $('body').on('click', '.btn-konfirmasi', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi Booking',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: "POST",
                            data: {
                                '_method': 'POST',
                                '_token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Success',
                                        response.success,
                                        'success'
                                    )
                                    table.draw();
                                }
                            },
                            error: function(jqXHR, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: thrownError,
                                })
                            }
                        });
                    }
                })
            });
        })
    </script>
@endpush
