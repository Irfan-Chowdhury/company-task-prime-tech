<!-- resources/views/data.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies | Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container p-4">

        @include('shared')


        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-primary">Back To Home</a>
            </div>
            <div>
                <h1 class="text-center">Company Create</h1>
            </div>
            <div></div>
        </div>

        {{-- <span class="text-danger">*</span> --}}

        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Ex: Prime Tech Solution">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea name="address" name="address" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group" id="item-list">
                <div id="1" class="item">
                </div>
            </div>
            <div class="col-xs-12 mt-2">
                <button type="button" data-repeater-create="" class="btn btn-warning btn-sm" id="add-invoice-item"> <i class="fa fa-plus"></i> Add Field</button>
            </div>



            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        (function($) {
        "use strict";

        $(document).on('click', '#add-invoice-item', function(){
            var item_id = parseInt($('#item-list .item:last').attr('id'))+1;
            let html =
            `<div id="item-list">
                <div id="${item_id}" class="item row">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Label Name</label>
                        <div class="col-sm-3">
                            <input type="text" name="labels[]" class="form-control">
                        </div>
                        <label class="col-sm-2 col-form-label">Field Value</label>
                        <div class="col-sm-3">
                            <input type="text" name="values[]" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="mt-2 btn icon-btn btn-danger btn-sm remove-invoice-item" data-repeater-delete=""> <span class="fa fa-trash"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            `;
            $('#item-list').append(html);
        });


            $(document).on('click', '.remove-invoice-item', function(){
                let item_id = $(this).parent().parent().attr('id');
                $('#'+item_id).remove();
            });

        })(jQuery);
    </script>
</body>

</html>
