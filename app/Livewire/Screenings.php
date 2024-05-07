<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Room;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Screening;
use Livewire\WithPagination;

class Screenings extends Component
{
    use WithPagination;

    public int $perPage = 2;
    public string $search = '';
    public $dateRange;
    public Screening|null $screening;
    #[Validate('required')]
    public $film_id = '';
    #[Validate('required')]
    public $room_number = '';
    #[Validate('required')]
    public array $seats;

    public $films;
    public $rooms;

    public bool $deleting = false;
    public bool $deletingSelected = false;
    public bool $editing = false;
    public bool $adding = false;

    public bool $selectAll = false;
    public array $seatSelected = [];
    public array $screeningSelected = [];

    public string $sortField = 'id';
    public string $sortDirection = 'asc';

    public function sortBy($sortField): void
    {
        $this->sortField = $sortField;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function mount()
    {
        $this->films = Film::all();
        $this->rooms = Room::all();
    }

    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
    }

    public function updatedPage($page)
    {
        $this->screeningSelected = [];
        $this->selectAll = false;
        $this->dispatch('updatePage');
    }

    public function render()
    {
        return view('livewire.screenings', [
            'screenings' => $this->getScreeningPaginate()
        ]);
    }

    public function getScreeningPaginate()
    {
        return Screening::search($this->search)
            ->when($this->dateRange, function ($query) {
                if (str_contains($this->dateRange, ' to ')) {
                    $query->whereBetween('created_at', convertDateRange($this->dateRange));
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function showModalEdit($screening_id)
    {
        $this->closeModal();
        $this->editing = true;
        $this->screening = Screening::find($screening_id);
        foreach ($this->screening->seats as $row) {
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
    }

    public function closeModal()
    {
        $this->adding = false;
        $this->editing = false;
        $this->deleting = false;
        $this->deletingSelected = false;
        $this->screening = null;
        $this->room_number = '';
        $this->screeningSelected = [];
    }

    public function submitForm()
    {
        if ($this->editing) {
            $this->updateScreening();
        }
        if ($this->adding) {
            $this->addScreening();
        }
        if ($this->deleting) {
            $this->deleteScreening();
        }
        if ($this->deletingSelected) {
            $this->deleteScreeningSelect();
        }
        $this->closeModal();
//        $this->screenings = Screening::all();
    }

    public function addScreening()
    {
        $this->validate();

        dd($this->film_id, $this->room_number, $this->seats);

        Screening::create([
            'film_id' => $this->film_id,
            'room_number' => $this->room_number,
            'seats' => $this->seats
        ]);
    }

    public function updateScreening()
    {
        Screening::where('id', $this->screening->id)->update([
            'seats' => $this->seats
        ]);
    }

    public function deleteScreening(): void
    {
        $this->screening->delete();
    }

    public function deleteScreeningSelect(): void
    {
        if (count($this->screeningSelected) > 0) {
            Screening::whereIn('id', $this->screeningSelected)->delete();
        }
    }

    public function showModalDelete(Screening|null $screening = null)
    {
        if ($screening->id == null) {
            $this->deletingSelected = true;
        } else {
            $this->deleting = true;
            $this->screening = $screening;
        }
    }

    // debug fn
    public function debug()
    {
        dd($this->room_number,$this->seats);
    }

    public function updatedSelectAll($selectAll): void
    {
        if ($selectAll) {
            $screeningIds = array_map(fn($screeningId) => strval($screeningId), $this->getScreeningPaginate()->pluck('id')->toArray());
            $this->screeningSelected = $screeningIds;
        } else {
            $this->screeningSelected = [];
        }
    }

    public function setSeats($room_number): void
    {
        $this->room_number = $room_number;
        $this->seats =Room::where('room_number', $room_number)->first()->seats;
    }


}
