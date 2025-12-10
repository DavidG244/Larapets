@forelse ($pets as $pet)

<tr class="{{ $pet->id % 2 == 0 ? 'bg-[#0006]' : '' }}">
    <th class="hidden md:table-cell">
        @php
        $number = $pets->total() - ($pets->firstItem() + $loop->index) + 1;
        @endphp
        {{ $number }}
    </th>
    <td>
        <div class="avatar">
            <div class="rounded-full w-16">
                <img src="{{ asset('images/' . ($pet->image ?? 'no-image.png')) }}" />
            </div>
        </div>
    </td>
    <td>{{ $pet->name }}</td>
    <td class="hidden md:table-cell">{{ $pet->kind }}</td>
    <td class="hidden md:table-cell">{{ $pet->breed }}</td>
    <td class="hidden md:table-cell">{{ $pet->age }}</td>
    <td class="hidden md:table-cell">{{ $pet->location }}</td>
    <td class="hidden md:table-cell">
        @if ($pet->status == 1)
        <div class="badge badge-outline badge-error">Adopted</div>
        @else
        <div class="badge badge-outline badge-success">Available</div>
        @endif
    </td>
    <td>
        <a class="btn btn-outline btn-xs" href="{{ url('pets/' . $pet->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
            </svg>
        </a>
    </td>
</tr>
@empty
<tr>
    <td colspan="9" class="text-center text-white">No pets found.</td>
</tr>
@endforelse