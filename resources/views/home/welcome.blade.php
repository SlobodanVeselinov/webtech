@extends('layouts.front')

@section('mainContent')

    
    <div class="border-b-2 text-gray-800 mb-14 pb-10">
        
        <h1 class="text-4xl mb-2">Title 1</h1>

        <span class="italic">Posted by: Slobodan Veselinov on 25.02.2022</span>

        <img src="{{ asset('pictures/1.jpg') }}" class="h-80 mt-10">
        
        <p class="mt-8 mb-8">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde id distinctio nihil accusantium enim cum et illum aspernatur repudiandae laboriosam laudantium in, inventore harum consectetur, debitis architecto dicta voluptas ex. Sequi reprehenderit, vel sapiente libero corrupti consequuntur unde distinctio nulla eum quos itaque, non ducimus dolores similique ipsum corporis explicabo ad excepturi. Sequi laboriosam numquam quisquam? Corporis aliquam quia repudiandae porro dolore soluta optio sit repellendus. Ad laudantium atque sed ea corrupti pariatur officia error veniam blanditiis qui repudiandae nesciunt similique natus dolorum voluptates vitae dolores consequuntur, perspiciatis fuga magni quaerat eaque. Tempore mollitia distinctio corrupti culpa rem odit repellendus.</p>
        <a href="{{ route('view.post') }}" class="px-3 py-2 bg-blue-500 text-white rounded-md">Read More</a>
    </div>


    <div class="border-b-2 text-gray-800 mb-14">
        
        <h1 class="text-4xl mb-2">Title 1</h1>

        <span class="italic">Posted by: Slobodan Veselinov on 25.02.2022</span>

        <img src="{{ asset('pictures/1.jpg') }}" class="h-80 mt-10">
        
        <p class="mt-8 mb-8">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde id distinctio nihil accusantium enim cum et illum aspernatur repudiandae laboriosam laudantium in, inventore harum consectetur, debitis architecto dicta voluptas ex. Sequi reprehenderit, vel sapiente libero corrupti consequuntur unde distinctio nulla eum quos itaque, non ducimus dolores similique ipsum corporis explicabo ad excepturi. Sequi laboriosam numquam quisquam? Corporis aliquam quia repudiandae porro dolore soluta optio sit repellendus. Ad laudantium atque sed ea corrupti pariatur officia error veniam blanditiis qui repudiandae nesciunt similique natus dolorum voluptates vitae dolores consequuntur, perspiciatis fuga magni quaerat eaque. Tempore mollitia distinctio corrupti culpa rem odit repellendus.</p>
        <button class="px-3 py-2 mb-5 bg-blue-500 text-white rounded-md">Read More</button>
    </div>



    <div class="border-b-2 text-gray-800 mb-14">
        
        <h1 class="text-4xl mb-2">Title 1</h1>

        <span class="italic">Posted by: Slobodan Veselinov on 25.02.2022</span>

        <img src="{{ asset('pictures/1.jpg') }}" class="h-80 mt-10">
        
        <p class="mt-8 mb-8">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde id distinctio nihil accusantium enim cum et illum aspernatur repudiandae laboriosam laudantium in, inventore harum consectetur, debitis architecto dicta voluptas ex. Sequi reprehenderit, vel sapiente libero corrupti consequuntur unde distinctio nulla eum quos itaque, non ducimus dolores similique ipsum corporis explicabo ad excepturi. Sequi laboriosam numquam quisquam? Corporis aliquam quia repudiandae porro dolore soluta optio sit repellendus. Ad laudantium atque sed ea corrupti pariatur officia error veniam blanditiis qui repudiandae nesciunt similique natus dolorum voluptates vitae dolores consequuntur, perspiciatis fuga magni quaerat eaque. Tempore mollitia distinctio corrupti culpa rem odit repellendus.</p>
        <button class="px-3 py-2 mb-5 bg-blue-500 text-white rounded-md">Read More</button>
    </div>


    </div>


@endsection