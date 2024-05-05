<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Rooms extends Component
{
    public $rooms;

    public $room;
    public $seatSelected = [];
    #[Validate('required')]
    public $room_number = '';
    public $seats;
    public bool $showModal = false;
    public bool $editing = false;
    public bool $adding = false;

    public function mount()
    {
        $this->rooms = Room::all();
        $this->room = (object)[];
        $this->seatSelected = [];
    }

    public function render()
    {
        return view('livewire.rooms');
    }

    public function showModalEdit($room_id)
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
        $this->showModal = true;
    }

    public function showModalAdd()
    {
        $this->room = (object)[];
        $this->room_number = '';
    }

    public function closeModal()
    {

        $this->showModal = false;
        $this->room = null;
        $this->seatSelected = [];
    }

    public function getSeatSelected()
    {
        dd($this->seatSelected);
    }

    public function updateRoom()
    {
        dd($this->room_number);
        $this->validate();
        $seats = $this->room->seats;

        foreach ($seats as $row) {
            foreach ($row as $key => $seat) {
                $seats[explode('_', $key)[0]][$key]['error'] = in_array($key, $this->seatSelected);
            }
        }
        Room::where('id', $this->room->id)->update([
            'room_number' => $this->room_number,
            'seats' => $seats
        ]);
        $this->closeModal();
        $this->rooms = Room::all();
    }
}
