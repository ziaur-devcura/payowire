<div class="mb-3 mb-0 text-center col-md-6 m-auto">

                                             @if(session('error'))

                                             <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    <strong>Error!</strong> {{ session('error') }}
                                </div>
                                

                                            @elseif(session('success'))

                                            <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>

                                                     @endif

                                    </div>