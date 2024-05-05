<?php

namespace App\Livewire;

use App\Models\Room;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Rooms extends Component
{
    use WithPagination;

    public int $perPage = 2;
    public string $search = '';
    public Room|null $room;
    #[Validate('required')]
    public string $room_number = '';
    public array $seats;

    public bool $deleting = false;
    public bool $deletingSelected = false;
    public bool $editing = false;
    public bool $adding = false;

    public bool $selectAll = false;
    public array $seatSelected = [];
    public array $roomSelected = [];


    public function mount()
    {
        $this->seatSelected = [];
    }

    public function render()
    {
        $rooms = Room::search($this->search)->paginate($this->perPage);
        return view('livewire.rooms', [
            'rooms' => $rooms
        ]);
    }

    public function showModalEdit($room_id)
    {
        $this->closeModal();
        $this->editing = true;
        $this->room = Room::find($room_id);
        $this->room_number = $this->room->room_number;
        $this->seats = json_decode(File::get('data/seats.json'), true);
        foreach ($this->room->seats as $row) {
            foreach ($row as $key => $seat) {
                if ($seat['error']) {
                    $this->seatSelected[] = $key;
                }
            }
        }
    }

    public function showModalAdd()
    {
        $this->closeModal();
        $this->adding = true;
        $this->room_number = '';
        $this->seats = json_decode(File::get('data/seats.json'), true);
    }

    public function closeModal()
    {
        $this->adding = false;
        $this->editing = false;
        $this->deleting = false;
        $this->deletingSelected = false;
        $this->room = null;
        $this->seatSelected = [];
        $this->roomSelected = [];
    }

    public function submitForm()
    {
        if ($this->editing) {
            $this->updateRoom();
        }
        if ($this->adding) {
            $this->addRoom();
        }
        if ($this->deleting) {
            $this->deleteRoom();
        }
        if ($this->deletingSelected) {
            $this->deleteRoomSelect();
        }
        $this->closeModal();
//        $this->rooms = Room::all();
    }

    public function addRoom()
    {
        $this->validate();
        foreach ($this->seatSelected as $seat) {
            $this->seats[explode('_', $seat)[0]][$seat]['error'] = true;
        }

        Room::create([
            'room_number' => $this->room_number,
            'seats' => $this->seats
        ]);
    }

    public function updateRoom()
    {

        foreach ($this->seatSelected as $seat) {
            $this->seats[explode('_', $seat)[0]][$seat]['error'] = true;
        }
        Room::where('id', $this->room->id)->update([
            'room_number' => $this->room_number,
            'seats' => $this->seats
        ]);
    }

    public function deleteRoom(): void
    {
        $this->room->delete();
    }

    public function deleteRoomSelect(): void
    {
        if (count($this->roomSelected) > 0) {
            Room::whereIn('id', $this->roomSelected)->delete();
        }
    }

    public function showModalDelete(Room|null $room = null)
    {
        if ($room->id == null) {
            $this->deletingSelected = true;
        } else {
            $this->deleting = true;
            $this->room = $room;
        }
    }

    // debug fn
    public function getSeatSelected()
    {
//        dd($this->seatSelected);
    }

    public function getRoomSelected()
    {
        dd($this->roomSelected);
    }

    public function updateSelectAll($roomIds)
    {
        $roomIds =array_map(fn($roomId)=>strval($roomId), $roomIds);
        if($this->selectAll) {
            $this->roomSelected = $roomIds;
        }else {
            $this->roomSelected = [];
        }

    }
}
