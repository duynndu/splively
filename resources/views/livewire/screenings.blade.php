<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Rooms List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Rooms</a></li>
                            <li class="breadcrumb-item active">Rooms List</li>
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
                            <h5 class="card-title mb-0 flex-grow-1">Rooms</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-wrap gap-2">
                                    <button wire:click="showModalAdd()" class="btn btn-danger add-btn">
                                        <i class="ri-add-line align-bottom me-1"></i>
                                        {{__('Add Room')}}
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
                                    <input wire:model.live="search" class="form-control search bg-light border-light"
                                           placeholder="Search for room number or something...">
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
                                    <th>
                                        <div class="form-check">
                                            <input wire:model="selectAll" class="form-check-input selectedAll"
                                                   type="checkbox">
                                        </div>
                                    </th>
                                    {{--                                    public function sortBy($sortField): void--}}
                                    {{--                                    {--}}
                                    {{--                                        $this->sortField = $sortField;--}}
                                    {{--                                        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';--}}
                                    {{--                                    }--}}
                                    {{--                                    để dùng x-table.heading phải định nghĩa hàm tren ở trong class component--}}
                                    {{--                                    :direction dùng  để truyền vào trạng thái sap xep asc hoặc desc--}}
                                    <x-table.heading :sortBy="'id'" :direction="$sortDirection">ID</x-table.heading>
                                    <x-table.heading :sortBy="'room_number'" :direction="$sortDirection">Room number
                                    </x-table.heading>
                                    <x-table.heading :sortBy="'created_at'" :direction="$sortDirection">Created at
                                    </x-table.heading>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all" id="ticket-list-data">
                                @foreach($screenings as $data)
                                    <tr wire:key="{{$data->id}}">
                                        <th>
                                            <div class="form-check">
                                                <input wire:model="screeningSelected" class="form-check-input selectedItem"
                                                       type="checkbox" value="{{$data->id}}">
                                            </div>
                                        </th>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->film_id}}</td>
                                        <td>{{$data->created_at}}</td>
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
                                                            Edit</a></li>
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
                            <div @class(['noresult', 'd-none' => $screenings->count()])>
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
                                {{$screenings->links() }}
                            </div>
                            <div wire:click="getScreeningSelected()" class="btn btn-primary">check</div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
            </div>
        </div>
        @if($editing || $adding)
            <div class="modal fade zoomIn show d-block" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button wire:click="closeModal()" type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"
                                    id="close-modal"></button>
                        </div>
                        <form wire:submit="submitForm()" class="tablelist-form">
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Film id</label>
                                            <select wire:model="film_id" class="form-select">
                                                <option value="0">Select film</option>
                                                @foreach($films as $film)
                                                    <option value="{{$film->id}}">{{$film->title}}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('film_id') {{$message}} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Room number</label>
                                            <select wire:model.live="room_number"
                                                    class="form-select">
                                                <option value="">Select Room number</option>
                                                @foreach($rooms as $room)
                                                    <option
                                                        value="{{$room->room_number}}">{{$room->room_number}}</option>
                                                @endforeach
                                            </select>
                                            {{$room_number}}
                                            <div class="text-danger">
                                                @error('room_number') {{$message}} @enderror
                                            </div>
                                        </div>
                                        @if($seats)
                                            <div class="mb-3">
                                                <div class="st_seat_full_container bg-dark">
                                                    <div
                                                        class="st_seat_lay_economy_wrapper st_seat_lay_economy_wrapperexicutive float_left">
                                                        @foreach($seats as $row=>$seatsRow)
                                                            <div
                                                                 class="st_seat_lay_row d-flex justify-content-center gap-5">
                                                                @php

                                                                    @endphp
                                                                @foreach(splitArray5_13_5($seatsRow) as $indexGroup=>$seatGroup)
                                                                    <ul
                                                                        class="{{$indexGroup === 0 ? '' : 'st_eco_second_row'}}">
                                                                        @if($indexGroup === 0)
                                                                            <li class="st_seat_heading_row">{{$row}}</li>
                                                                        @endif
                                                                        @foreach($seatGroup as $seatNumber=>$seat)
                                                                            <li>
                                                                                <input id="{{$seatNumber}}"
                                                                                       type="checkbox"
                                                                                       value="{{$seatNumber}}"
                                                                                       wire:model="seatSelected">
                                                                                <label for="{{$seatNumber}}"
                                                                                       seat_number="{{explode('_',$seatNumber)[1]}}"
                                                                                       class="seat_number"></label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="text-danger">
                                                    @error('seats') {{$message}} @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button wire:click="closeModal()" type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button class="btn btn-success">{{$editing ? 'Update' : 'Add'}}</button>
                                    <div wire:click="debug()" class="btn btn-primary">check</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <!-- Modal -->
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
                                    <button wire:click="submitForm()" class="btn btn-danger"
                                            id="delete-record">Yes, Delete It
                                    </button>
                                    <div wire:click="debug()" class="btn btn-primary">check
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--end modal -->
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

