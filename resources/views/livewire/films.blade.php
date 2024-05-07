<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Films List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Films</a></li>
                            <li class="breadcrumb-item active">Films List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="ticketsList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Films</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-wrap gap-2">
                                    <button wire:click="showModalInsert()"  class="btn btn-danger add-btn" >
                                            <i class="ri-add-line align-bottom me-1"></i>
                                        Create Film
                                    </button>
                                    
                                    <button class="btn btn-soft-danger" id="remove-actions" onclick="deleteMultiple()">
                                        <i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-dashed border-end-0 border-start-0">                     
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-12">
                                <div class="search-box">
                                    <input wire:model.live="search"  type="text" class="form-control search bg-light border-light"
                                            placeholder="Search for title details or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-4">
                                <input x-on:input="$wire.setDateRange($event.target.value)" type="text" 
                                        class="form-control bg-light border-light"
                                        data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                        id="demo-datepicker" placeholder="Select date range">
                            </div>
                            <!--end col-->

                            <div class="col-xl col-sm-4 d-flex gap-2">
                                <button wire:click="showModalDelete()" class="btn btn-soft-danger d-block ms-auto"
                                        id="remove-actions"><i class="ri-delete-bin-2-line"></i></button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="table-card mb-4">
                            <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 40px;">
                                        <div class="form-check">
                                            <input wire:model="selectAll" class="form-check-input selectedAll" type="checkbox" 
                                                   value="option">
                                        </div>
                                    </th>
                                    <x-table.heading :sortBy="'id'" :direction="$sortDirection">ID</x-table.heading>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <x-table.heading :sortBy="'duration'" :direction="$sortDirection">Duration</x-table.heading>
                                    <x-table.heading :sortBy="'release_date'" :direction="$sortDirection">Release_date</x-table.heading>
                                    <th>Image</th>
                                    <th>Trailer</th>
                                    <th>Genre</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all" id="ticket-list-data">
                                @foreach($films as $data)
                                    <tr wire:key="{{$data->id}}">
                                        <th>
                                            <div class="form-check">
                                                <input wire:model="filmSelected" class="form-check-input selectedItem"
                                                type="checkbox" value="{{$data->id}}">
                                            </div>
                                        </th>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{$data->duration}} phút</td>
                                        <td>{{$data->release_date}}</td>
                                        <td><img width="100px" src="{{$data->images['cover']}}" alt=""> </td>
                                        <td>{{$data->trailer}}</td>
                                        <td>{{$data->genre_name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <button class="dropdown-item">
                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a wire:click="showModalEdit({{$data->id}})"
                                                           class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a wire:click="showModalDelete({{$data->id}})" 
                                                            class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div @class(['noresult', 'd-none' => $films->count()])>
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                               colors="primary:#121331,secondary:#08a88a"
                                               style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">Không có kết quả.</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="p-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <label class="mb-0">Per page</label>
                                    <select wire:model.live="perPage"
                                            class="form-select form-select-sm d-inline w-auto">
                                        <option value="2">2</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                    </select>
                                </div>
                                {{$films->links() }}
                            </div>
                            <div wire:click="getFilmSelected()" class="btn btn-primary">check</div>
                        </div>

                        @if($deleting || $deletingSelected)
                            <div class="modal fade flip show d-block">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                       colors="primary:#405189,secondary:#f06548"
                                                       style="width:90px;height:90px"></lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4>You are about to delete a order ?</h4>
                                                <p class="text-muted fs-14 mb-4">Deleting your order will remove all of
                                                    your
                                                    information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button wire:click="closeModal()"
                                                        class="btn btn-link link-success fw-medium text-decoration-none"
                                                        id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close
                                                    </button>
                                                    <button wire:click="submitForm()" class="btn btn-danger" id="delete-record">Yes, Delete It
                                                    </button>
                                                    <div wire:click="getFilmSelected()" class="btn btn-primary">check</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        @if ($editing || $adding)
            <div class="modal fade zoomIn show" style="display: block" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal">
                            </button>
                        </div>
                        <form wire:submit="submitForm()" class="tablelist-form">
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Film name</label>
                                            <input type="text" id="name" class="form-control"
                                                wire:model="name">
                                            <div class="text-danger">
                                                @error('name') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Film title</label>
                                            <input type="text" id="title" class="form-control"
                                                wire:model="title">
                                            <div class="text-danger">
                                                @error('title') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Film description</label>
                                            <input type="text" id="description" class="form-control"
                                            wire:model="description">
                                            <div class="text-danger">
                                                @error('description') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration" class="form-label">Film duration</label>
                                            <input type="text" id="duration" class="form-control"
                                                wire:model="duration">
                                            <div class="text-danger">
                                                @error('duration') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="release_date" class="form-label">Release date</label>
                                            <input type="date" id="release_date" class="form-control"
                                                wire:model="release_date">
                                            <div class="text-danger">
                                                @error('release_date') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Ảnh bìa</label>
                                            <input type="file" id="images" class="form-control"
                                                wire:model="images.cover">
                                            @if ($adding)
                                                <div class="text-danger">
                                                    @error('images.cover') {{$message}} @enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="images" class="form-label">Images</label>
                                            <input type="file" id="images" class="form-control"
                                                wire:model="images.gallery" multiple>
                                            @if ($adding)
                                                <div class="text-danger">
                                                    @error('images.gallery') {{$message}} @enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="trailer" class="form-label">Trailer</label>
                                            <input type="text" id="trailer" class="form-control"
                                                wire:model="trailer">
                                            <div class="text-danger">
                                                @error('trailer') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="trailer" class="form-label">Genre</label>
                                            <select class="form-select" id="genre" wire:model="genre">
                                                <option value="">Select genre</option>
                                                @foreach ($genres as $genre)
                                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                                @endforeach
                                              </select>
                                            {{-- <input type="text" id="genre" class="form-control"
                                                wire:model="genre"> --}}
                                            <div class="text-danger">
                                                @error('genre') {{$message}} @enderror
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button wire:click="closeModal()" type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <div wire:click="checkFilm()" class="btn btn-primary">check</div>
                                    <button class="btn btn-success" id="add-btn">{{$editing ? 'Update Film' : 'Add Film'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @script
        <script>
            document.addEventListener('updatePage', () => {
                $('.selectedAll').prop('checked', false)
            })
            $('.selectedAll').click(function () {
                $('.selectedItem').prop('checked', this.checked);
            })
            $(document).on('click', '.selectedItem', function () {
                $('.selectedAll').prop('checked', $('.selectedItem:checked').length === $('.selectedItem').length);
            });
        </script>
        @endscript
    </div>
</div>
<!-- container-fluid -->

