@props(['seats'=>''])
@if($seats)
    <div class="mb-3">
        <div class="st_seat_full_container bg-dark">
            <div
                class="st_seat_lay_economy_wrapper st_seat_lay_economy_wrapperexicutive float_left">
                @foreach($seats as $row=>$seatsRow)
                    <div wire:key="{{$row}}"
                         class="st_seat_lay_row d-flex justify-content-center gap-5">
                        @php

                        @endphp
                        @foreach(splitArray5_13_5($seatsRow) as $indexGroup=>$seatGroup)
                            <ul wire:key="{{$indexGroup}}" class="{{$indexGroup === 0 ? '' : 'st_eco_second_row'}}">
                                @if($indexGroup === 0)
                                    <li class="st_seat_heading_row">{{$row}}</li>
                                @endif
                                @foreach($seatGroup as $seatNumber=>$seat)
                                    <li wire:key="{{$seatNumber}}">
                                        <input id="{{$seatNumber}}" type="checkbox"
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
