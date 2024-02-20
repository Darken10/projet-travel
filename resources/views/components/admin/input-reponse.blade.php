@props(['name'=>'message','placeholder'=>"Votre message ... "])
  
  <div class="py-2">
    <div class="mt-4 flex items-center">
        <textarea
          type="text"
          class="flex-1 py-2 px-3 rounded-xl bg-gray-100 focus:outline-none @error($name) border-red-600 @enderror"
          rows="2"
          name="{{ $name }}"
          id="{{ $name }}"
          placeholder="{{ $placeholder }}"
        ></textarea>
        
        <button class="  bg-blue-500 w-12 h-12 text-white px-2 py-2 rounded-full ml-3 hover:bg-blue-600">
          send
        </button>
      </div>
        @error($name)
          <div class="text-red-600 text-xs">
              {{ $message }}
          </div>
        @enderror

  </div>
