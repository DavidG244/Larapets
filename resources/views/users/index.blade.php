

@extends('layouts.dashboard')

@section('title', 'Module Users: Larapets 🐶')

@section('content')


<h1 class="text-4x1 text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
        <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
    </svg>
    Module Users
</h1>



<div class="join bg-[#000] max-auto">
    <a href="{{ route('users.create') }}" class="btn btn-outline btn-success join-item">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
        </svg>
        <span class="hidden md:inline">Add User</span>
    </a>
    <a class="btn btn-outline text-white hover:bg-[#fff6] hover:text-white join-item" href="{{ url('export/users/pdf') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z"></path>
        </svg>
        <span class="hidden md:inline">Export</span>
    </a>
    <a class="btn btn-outline text-white hover:bg-[#fff6] hover:text-white join-item" href="{{ url('export/users/excel') }}">
        <svg xmlns=" http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path d="M156,208a8,8,0,0,1-8,8H120a8,8,0,0,1-8-8V152a8,8,0,0,1,16,0v48h20A8,8,0,0,1,156,208ZM92.65,145.49a8,8,0,0,0-11.16,1.86L68,166.24,54.51,147.35a8,8,0,1,0-13,9.3L58.17,180,41.49,203.35a8,8,0,0,0,13,9.3L68,193.76l13.49,18.89a8,8,0,0,0,13-9.3L77.83,180l16.68-23.35A8,8,0,0,0,92.65,145.49Zm98.94,25.82c-4-1.16-8.14-2.35-10.45-3.84-1.25-.82-1.23-1-1.12-1.9a4.54,4.54,0,0,1,2-3.67c4.6-3.12,15.34-1.72,19.82-.56a8,8,0,0,0,4.07-15.48c-2.11-.55-21-5.22-32.83,2.76a20.58,20.58,0,0,0-8.95,14.95c-2,15.88,13.65,20.41,23,23.11,12.06,3.49,13.12,4.92,12.78,7.59-.31,2.41-1.26,3.33-2.15,3.93-4.6,3.06-15.16,1.55-19.54.35A8,8,0,0,0,173.93,214a60.63,60.63,0,0,0,15.19,2c5.82,0,12.3-1,17.49-4.46a20.81,20.81,0,0,0,9.18-15.23C218,179,201.48,174.17,191.59,171.31ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,1,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.68L160,51.31Z"></path>
        </svg>
        <span class="hidden md:inline">Export</span>
    </a>
    <form class="join-item" action="{{ url('import/users') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file" class="hidden" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <button type="button" class="btn btn-outline text-white hover:bg-[#fff6] hover:text-white btn-import">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                <path d="M213.66,82.34l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V88A8,8,0,0,0,213.66,82.34ZM160,51.31,188.69,80H160ZM200,216H56V40h88V88a8,8,0,0,0,8,8h48V216Zm-42.34-77.66a8,8,0,0,1-11.32,11.32L136,139.31V184a8,8,0,0,1-16,0V139.31l-10.34,10.35a8,8,0,0,1-11.32-11.32l24-24a8,8,0,0,1,11.32,0Z"></path>
            </svg>
            <span class="hidden md:inline">Import</span>
        </button>
    </form>
</div>
{{-- Options --}}
<label class="input text-white bg-[#0009] outline-none mb-10">
    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <g
            stroke-linejoin="round"
            stroke-linecap="round"
            stroke-width="2.5"
            fill="none"
            stroke="currentColor">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </g>
    </svg>
    <input type="search" required placeholder="Search" name="qsearch" id="qsearch" />
</label>



<div class="overflow-x-auto text-white rounded-box bg-[#fff9]">
    <table class="table bg-[#0009]">
        <!-- head -->
        <thead class="text-white bg-[#000]">
            <tr>
                <th class="hidden md:table-cell">Id</th>
                <th>Photo</th>
                <th class="hidden md:table-cell">Document</th>
                <th>Full Name</th>
                <th class="hidden md:table-cell">Role</th>
                <th class="hidden md:table-cell">Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="datalist">
            @foreach ($users as $user)

            <tr class="{{ $user->id % 2 == 0 ? 'bg-[#0006]' : '' }}">
                <th class="hidden md:table-cell">{{ $user->id }}</th>
                <td>
                    <div class="avatar">
                        <div class="rounded-full w-16">
                            <img src="{{ asset('images/' . $user->photo) }}" />
                        </div>
                    </div>
                </td>
                <td class="hidden md:table-cell">{{ $user->document }}</td>
                <td>{{ $user->fullname }}</td>
                <td class="hidden md:table-cell">
                    @if ($user->role == 'Administrator')
                    <div class="badge badge-outline badge-warning">Admin</div>
                    @else
                    <div class="badge badge-outline badge-default">Customer</div>
                    @endif
                </td>
                <td class="hidden md:table-cell">
                    @if ($user->active == 1)
                    <div class="badge badge-outline badge-success">Active</div>
                    @else
                    <div class="badge badge-outline badge-error">Inactive</div>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline btn-xs" href="{{ url('users/' . $user->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                        </svg>
                    </a>
                    <a class="btn btn-outline btn-xs" href="{{ url('users/' . $user->id . '/edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                        </svg>
                    </a>
                    <a class="btn btn-outline btn-error btn-xs btn-delete" href="javascript:;" data-fullname="{{ $user->fullname }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                        </svg>
                    </a>
                    <form class="hidden" method="POST" action="{{ url('users/' . $user->id) }}">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>
            @endforeach
            <tr class="bg-[#0009]">
                <td colspan="7">{{ $users->links('layouts.pagination') }}</td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal --}}
<dialog id="modal_message" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Congratulations!</h3>
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
{{-- Modal Delete --}}
<dialog id="modal_delete" class="modal bg-[#0009]">
    <div class="modal-box bg-[#000] text-white">
        <h3 class="text-lg font-bold mb-4">
            Are you sure?!
        </h3>
        <div role="alert" class="alert alert-warning alert-outline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>You want to delete: <strong class="fullname"></strong></span>
        </div>
        <div class="flex gap-2 mt-4">
            <button class="btn btn-default btn-outline btn-sm btn-confirm">Confirm</button>
            <form method="dialog">
                <button class="btn btn-default btn-outline btn-sm">Cancel</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>cancel</button>
    </form>
</dialog>
@endsection

@section('js')
<script>
    // Modal
    $(document).ready(function() {
        const modal_message = document.getElementById('modal_message');
        @if(session('message'))
        modal_message.showModal();
        @endif


        // Delete ----------------
        $('table').on('click', '.btn-delete', function() {
            $fullname = $(this).data('fullname')
            $('.fullname').text($fullname);
            $fsm = $(this).next()
            modal_delete.showModal();

        })
        $('.btn-confirm').on('click', function(e) {
            e.preventDefault()
            $fsm.submit()
        })


        // Search ----------------
        function debounce(func, wait) {
            let timeout
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout)
                    func(...args)
                };
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }
        const search = debounce(function(query) {

            $token = $('input[name=_token]').val()

            $.post("search/users", {
                    'q': query,
                    '_token': $token
                },
                function(data) {
                    $('.datalist').html(data).hide().fadeIn(1000)
                }
            )
        }, 500)
        $('body').on('input', '#qsearch', function(event) {
            event.preventDefault()
            const query = $(this).val()

            $('.datalist').html(`<tr>
                                        <td colspan="7" class="text-center py-18">
                                            <span class="loading loading-spinner loading-xl"></span>
                                        </td>
                                    </tr>`)
            if (query != '') {
                search(query)
            } else {
                setTimeout(() => {
                    window.location.replace('users')
                }, 500);
            }
        })
        // Import
        $('.btn-import').click(function(e) {
            $('#file').click();
        })
        $('#file').change(function(e) {
            $(this).parent().submit();
        })
    })
</script>
@endsection