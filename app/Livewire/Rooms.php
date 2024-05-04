<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Rooms extends Component
{
    public $rooms;

    public $room = null;
    public $seatSelected = [];
    public $room_number = '';
    public bool $roomEditing = false;

    public function mount()
    {
        $this->rooms = Room::all();
    }

    public function render()
    {
        return view('livewire.rooms');
    }

    public function setRoom($room_id)
    {
        $this->room = Room::find($room_id);
        $this->room_number = $this->room->room_number;
        foreach ($this->room->seats as $row) {
            foreach ($row as $key => $seat) {
                if ($seat['error']) {
                    $this->seatSelected[] = $key;
                }
            }
        }
        $this->roomEditing = true;
    }

    public function closeRoomEditModal()
    {
        $this->roomEditing = false;
        $this->room = null;
        $this->seatSelected = [];
    }

    public function getSeatSelected()
    {
        dd($this->seatSelected);
    }

    public function updateRoom()
    {
        $seats = $this->room->seats;
//        dd($seats['D']['D_01']['error']);
        foreach ($seats as $row) {
            foreach ($row as $key => $seat) {
                if (!in_array($key, $this->seatSelected)){
                    $seats[explode('_', $key)[0]][$key]['error'] = false;
                }else{
                    $seats[explode('_', $key)[0]][$key]['error'] = true;
                }
            }
        }
        Room::where('id', $this->room->id)->update([
            'room_number' => $this->room_number,
            'seats' => $seats
        ]);
        $this->closeRoomEditModal();
        $this->rooms = Room::all();
    }
}
