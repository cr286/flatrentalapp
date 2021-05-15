@extends('layouts.guestlayout')

@section('content')
  <!-- component --> 
<div class="">
  <div class='flex max-w-xl my-10 bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
      <div class='flex items-center w-full'>
          <div class='w-full'>
              <div class="flex flex-row mt-2 px-2 py-3 mx-3">
                  <div class="w-auto h-auto rounded-full border-2 border-pink-500">
                      <img class='w-12 h-12 object-cover rounded-full shadow cursor-pointer' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                  </div>
                  <div class="flex flex-col mb-2 ml-4 mt-1">
                 
                      <div class='text-gray-600 text-sm font-semibold'>{{ $apartment->user->name }}</div>
                      <div class='flex w-full mt-1'>
                          <div class='text-blue-700 font-base text-xs mr-1 cursor-pointer'>
                           Created On:
                          </div> 
                          <div class='text-gray-400 font-thin text-xs'>
                            {{ $apartment->created_at->diffForHumans() }}
                          </div>
                      </div>
                  </div>
              </div>
              <div class="border-b border-gray-100"></div> 
              <div class='text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2'><img class="rounded" src="https://picsum.photos/536/354"></div>
              <div class='text-gray-600 font-semibold text-lg mb-2 mx-3 px-2'>{{ $apartment->apartmentName }}</div>
              <div class='text-gray-500 font-thin text-sm mb-6 mx-3 px-2'>Purpose: {{ $apartment->purpose }}</div> 
            <div class='text-gray-500 font-thin text-sm mb-6 mx-3 px-2'> Description: {{ $apartment->description }} </div>
              
              <div class="flex w-full border-t border-gray-100">
                  <div class="mt-3 mx-5 flex flex-row">
                      <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Comments:<div class="ml-1 text-gray-400 font-thin text-ms"> 30</div></div>
                      <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Views: <div class="ml-1 text-gray-400 font-thin text-ms"> 60k</div></div>
                  </div>
                  <div class="mt-3 mx-5 w-full flex justify-end">
                      <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Likes: <div class="ml-1 text-gray-400 font-thin text-ms"> 120k</div></div>
                  </div>
              </div>

              
                @if ($comments->count())
                @foreach ($comments as $comment) 
                <div class="flex flex-row mt-2 px-2 py-3 mx-3">
                <div class="w-auto h-auto rounded-full border-2">
                <img class='w-12 h-12   rounded-full shadow cursor-pointer' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                </div>
                <div class="flex flex-col mb-2 ml-4 mt-1"> 
                <div class='text-gray-600 text-sm font-semibold cursor-pointer'>{{ $comment->user->name }}</div>
                <div class='flex w-full mt-1'>
                <p class='text-gray-400 font-thin text-xs mr-1'>
                {{ $comment->description }}
                </p>  
                <div class='text-blue-700 font-base text-xs '>
                {{ $comment->created_at->diffForHumans() }}
                </div>
                </div>  
                </div>
                </div>
                @endforeach 
                {{ $comments->links() }}
                @else
                <p>There are no comments</p>
                @endif

              <form action="{{ route('comment.create',$apartment) }}" method="post">   
                 @csrf
              <div class="relative flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                  <img class='w-10 h-10 object-cover rounded-full shadow mr-2 cursor-pointer' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                  <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                      <button type="submit" class="p-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                      <svg class="w-6 h-6 transition ease-out duration-300 hover:text-blue-500 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                      </button>
                  </span>
                
                   <input type="text" name="comment" id="comment"  class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue" style="border-radius: 25px" placeholder="Post a comment..." autocomplete="off">
              </div>
            </form>
          </div>
      </div>
  </div>
  <script data-name="BMC-Widget" data-cfasync="false" src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js" data-id="matheusgongo" data-description="Support me on Buy me a coffee!" data-message="Thank you for visiting! :D" data-color="#BD5FFF" data-position="Right" data-x_margin="18" data-y_margin="18"></script>
</div> 
 
   
@endsection