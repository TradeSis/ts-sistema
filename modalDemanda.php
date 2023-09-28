<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>


    <div class="container-fluid pt-4">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
            MODAL DEMANDA
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inserir Solicitações</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9 col-lg-9">
                                <label for="exampleInputEmail1" class="form-label">campo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <label for="exampleInputEmail1" class="form-label">campo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="container-fluid p-0">
                                    <div class="col">
                                        <span class="tituloEditor">Editor</span>
                                    </div>
                                    <div class="quill-demandainserir" style="height:20vh !important"></div>
                                    <textarea style="display: none" id="quill-demandainserir" name="descricao"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 1</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 2</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 3</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 4</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 5</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleInputEmail1" class="form-label">campo 6</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var demandaContrato = new Quill('.quill-demandainserir', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }],
                    /*  [{
                       'header': [1, 2, 3, 4, 5, 6, false]
                     }], */
                    ['link', 'image'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'font': []
                    }],
                    [{
                        'align': []
                    }],
                ]
            }
        });

        demandaContrato.on('text-change', function(delta, oldDelta, source) {
            $('#quill-demandainserir').val(demandaContrato.container.firstChild.innerHTML);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>