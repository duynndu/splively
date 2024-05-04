<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tickets List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tickets</a></li>
                            <li class="breadcrumb-item active">Tickets List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        filter
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="ticketsList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Tickets</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-danger add-btn" data-bs-toggle="modal"
                                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
                                        Create Tickets
                                    </button>
                                    <button class="btn btn-soft-danger" id="remove-actions" onclick="deleteMultiple()">
                                        <i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form>
                            <div class="row g-3">
                                <div class="col-xxl-5 col-sm-12">
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light"
                                               placeholder="Search for ticket details or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-light"
                                           data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                           id="demo-datepicker" placeholder="Select date range">
                                </div>
                                <!--end col-->

                                <div class="col-xxl-3 col-sm-4">
                                    <div class="input-light">
                                        <select class="form-control" data-choices="" data-choices-search-false=""
                                                name="choices-single-default" id="idStatus">
                                            <option value="">Status</option>
                                            <option value="all" selected="">All</option>
                                            <option value="Open">Open</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Closed">Closed</option>
                                            <option value="New">New</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-1 col-sm-4">
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();"><i
                                            class="ri-equalizer-fill me-1 align-bottom"></i>
                                        Filters
                                    </button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="table-card mb-4">
                            <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 40px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                   value="option">
                                        </div>
                                    </th>
                                    <th class="sort desc" data-sort="id">ID</th>
                                    <th class="sort" data-sort="tasks_name">Room number</th>
                                    <th class="sort" data-sort="client_name">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all" id="ticket-list-data">
                                @foreach($rooms as $data)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll"
                                                       value="option1">
                                            </div>
                                        </th>
                                        <td class="id">
                                            <a href="javascript:void(0);" onclick="ViewTickets(this)" data-id="8"
                                               class="fw-medium link-primary ticket-id">{{$data->id}}</a>
                                        </td>
                                        <td class="tasks_name">{{$data->room_number}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <button class="dropdown-item"
                                                                onclick="location.href = 'apps-tickets-details.html';">
                                                            <i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a wire:click="setRoom({{$data->id}})"
                                                           class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn" data-bs-toggle="modal"
                                                           href="#deleteOrder">
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
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                               colors="primary:#121331,secondary:#08a88a"
                                               style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Tickets We did not find any
                                        Tickets for you search.</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <div class="pagination-wrap hstack gap-2" style="display: flex;">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0">
                                    <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                                    <li><a class="page" href="#" data-i="2" data-page="8">2</a></li>
                                </ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                   colors="primary:#405189,secondary:#f06548"
                                                   style="width:90px;height:90px"></lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4>You are about to delete a order ?</h4>
                                            <p class="text-muted fs-14 mb-4">Deleting your order will remove all of your
                                                information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                        id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close
                                                </button>
                                                <button class="btn btn-danger" id="delete-record">Yes, Delete It
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        @if($roomEditing)
            <div class="modal fade zoomIn show" style="display: block" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                        </div>
                        <form class="tablelist-form">
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="room_number" class="form-label">Room number</label>
                                            <input type="text" id="room_number" class="form-control"
                                                   wire:model="room_number">
                                        </div>
                                        <div class="mb-3">
                                            <div class="st_seat_full_container bg-dark">
                                                <div
                                                        class="st_seat_lay_economy_wrapper st_seat_lay_economy_wrapperexicutive float_left">
                                                    @php
                                                        $seatsRows = $room->seats;
                                                    @endphp
                                                    @foreach($seatsRows as $row=>$seatGroup)
                                                        @php
                                                            $seatGroup = splitArray5_13_5($seatGroup);
                                                        @endphp
                                                        <div
                                                                class="st_seat_lay_row d-flex justify-content-center gap-5">
                                                            @foreach($seatGroup as $indexGroup=>$seats)
                                                                <ul class="{{$indexGroup === 0 ? '' : 'st_eco_second_row'}}">
                                                                    @if($indexGroup === 0)
                                                                        <li class="st_seat_heading_row">{{$row}}</li>
                                                                    @endif
                                                                    @foreach($seats as $seatNumber=>$seat)
                                                                        <li>
                                                                            <input {{$seat['error'] ?'checked':''}} id="{{$seatNumber}}" type="checkbox"
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button wire:click="closeRoomEditModal()" type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <div wire:click="getSeatSelected()" class="btn btn-primary">check</div>
                                    <button wire:click="updateRoom()" type="button" class="btn btn-success" id="add-btn">Edit room</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- container-fluid -->

