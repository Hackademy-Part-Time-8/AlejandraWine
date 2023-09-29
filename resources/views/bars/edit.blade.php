@extends('layouts.layout')

@section('title', 'Nuevo bar')

@section('content')
    <h1>Edit Bar</h1>

    <x-msg-error :errors="$errors" />
    <x-message code="{{ Session::get('code') }}" message="{{ Session::get('message') }}" />
    <div class=row>
        <form method="POST" action="{{ route('bars.update', $bar->id) }}" enctype="multipart/form-data">
            <!-- csrf es una validacion de seguriad. Viene dentro de laravel ya creada-->
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Bar Name</label>
                <input class="form-control" id="name" name="name" value="{{ $bar->name }}"
                    aria-describedby="nameHelp">
                <div id="namelHelp" class="form-text">What is your bar called?</div>
            </div>



            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $bar->description }}</textarea>
                <div id="descriptionHelp" class="form-text">Describe your bar in a few words.Try to be as original as
                    possible so you can stand out!</div>
            </div>
            <div class="mb-3 d-flex row">
                <label for="wines" class="form-label">Wine list</label>
                @foreach ($wines as $wine)
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="{{ $wine->id }}"
                            id="wine{{ $wine->id }}" name="wines[]" {{ $bar->wines->find($wine->id) ? 'checked' : '' }}>

                        <label class="form-check-label" for="wine{{ $wine->id }}">
                            {{ $wine->name }}
                        </label>
                    </div>
                @endforeach

            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload your pictures here</label>

                <div id="dropzone" class="mb-3 border border-primary border border-2 rounded p-4">
                    <div class="text-center opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="#8B3030"
                            class="bi bi-cloud-upload " viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                            <path fill-rule="evenodd"
                                d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                        </svg><br>
                         <p id='txtImgNames'>Drop your images here or </p>
                         <input class="image" type="file" id="image" name="image[]" multiple>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="S" id="borrarimg" name="borrarimg">Delete
                picture
            </div>
            <button type="submit" class="botones">Submit</button>
        </form>
        <script>
            const dropzone = document.getElementById('dropzone');
            const fileupload = document.getElementById('image');
            dropzone.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropzone.classList.remove('opacity-75');

            });
            dropzone.addEventListener("dragleave", (e) => {

                dropzone.classList.add('opacity-75');

            });
            dropzone.addEventListener("drop", (e) => {
                e.preventDefault();
                fileupload.files = e.dataTransfer.files;
                setFileNames()

            });
            function setFileNames(){
                let x= '';
                for(let i =0; i<fileupload.files.length; i++){
                    x+= '<br>' +fileupload.files[i].name;
                }
                document.getElementById('txtImgNames').innerHTML = x;
            }
        </script>
    @endsection
