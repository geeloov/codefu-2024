<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="flex items-center justify-center h-[100vh]">
    <div class="w-[80%] mt-14 mx-auto">
      <div class="flex justify-between">
        <div class="mb-2">
          <a href="{{route('homepage')}}">
                <svg
                  width="34"
                  height="34"
                  viewBox="0 0 34 34"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="none"
                >
                  <path
                    d="M33.7499 9.87631V9.877V24.123C33.7499 27.1672 32.843 29.5669 31.2039 31.2052C29.5648 32.8435 27.1639 33.75 24.118 33.75H9.88192C6.83607 33.75 4.43527 32.8435 2.79615 31.2032C1.15701 29.5628 0.25 27.1589 0.25 24.106V9.877C0.25 6.83275 1.1569 4.43314 2.79604 2.79482C4.43519 1.15649 6.83606 0.25 9.88192 0.25H24.135C27.1809 0.25 29.5817 1.15651 31.2187 2.79471C32.8556 4.43285 33.7583 6.83222 33.7499 9.87631ZM12.1185 10.766L12.2528 10.6318C12.8437 10.0412 12.8437 9.06682 12.2528 8.47618C11.6619 7.88561 10.6873 7.88561 10.0964 8.47618L7.42606 11.1452C6.83522 11.7357 6.83512 12.7098 7.42575 13.3005C7.42585 13.3006 7.42595 13.3007 7.42606 13.3008L10.0958 15.9863L10.0964 15.9868C10.4009 16.2912 10.7887 16.434 11.1746 16.434C11.5604 16.434 11.9483 16.2912 12.2528 15.9868C12.8602 15.3797 12.8602 14.4246 12.2727 13.8172L12.2728 13.8172L12.2698 13.8142L12.2546 13.799H20.2741C22.3302 13.799 23.9871 15.4552 23.9871 17.51C23.9871 19.5641 22.3139 21.221 20.2741 21.221H11.9059C11.0706 21.221 10.3803 21.9108 10.3803 22.746C10.3803 23.5812 11.0706 24.271 11.9059 24.271H20.2741C24 24.271 27.0383 21.253 27.0383 17.527C27.0383 13.8018 24.0008 10.766 20.2741 10.766H12.1185Z"
                    fill="#3F8D8B"
                    stroke="black"
                    stroke-width="0.5"
                  ></path>
                </svg>
              </a>
        </div>

        
            <div>
                <div class="flex flex-row gap-2">
                  <div class="mb-1">
                    <span class="text-[25px] italic text-left text-[#2a2a2a]">{{Auth::user()->points}}</span>
                  </div>
                  <div>
                    <img src="{{asset('/images/coin_image/Group 57.png')}}" class="w-[32px] h-[32px]" alt="">
                  </div>
                </div>
            </div>
        </div>

      <div class="h-[493px] bg-[#D9D9D9] rounded-[14px]">
        <div id="category-buttons" class="justify-between flex flex-row gap-[10px] pt-[10px] px-[8px] overflow-x-scroll	">
          
        @foreach ($categories as $category)
            <div id="button-{{$category->id}}" class="flex"> <!--hidden-->
                <button onclick="switchCategory({{ json_encode($category) }}, 'button-{{$category->id}}')">
                    <p class="text-base font-light text-center text-[#9d9d9d]">{{$category->name}}</p>
                </button>
            </div>            
        @endforeach
        
        <div id="button-owned" class="flex"> <!--hidden-->
            <button onclick="switchCategory(ownedItems, 'button-owned')">
                <p class="text-base font-light text-center text-[#9d9d9d]">Owned</p>
            </button>
        </div>
        
          
          
          <div>

            </div>
            
        </div>
      
        <div class="flex flex-row justify-center mt-[7px]">
          <p id="category-title" class="text-[22px] font-light text-[#797979]">Specials</p>
        </div>
      
        <div class="mt-[23px] overflow-y-scroll h-[350px]">
          <div id="category-content" class="grid grid-cols-3 gap-4 px-[14px]">
            <div class="items-center place-items-center">
              <div class="rounded-[11px] bg-transparent border border-[#797272]  w-[60px] h-[60px]">
                <img src="./specials.png" alt="" class="">
              </div>
              <p class="text-[18px] font-bold text-left text-black/40">Special 1</p>
              <p class="text-[10px] text-semibold text-center text-black/40">You’ve got all specials</p>
            </div>
          </div>
        </div>
      </div>
      

<script>
    var ownedItems = {
        name: 'Owned',
        items: @json($ownedItems) // Convert PHP array to JavaScript object
    };
    console.log(ownedItems);

    let lastVisibleButtonId = 'button-specials';

    function switchCategory(categoryOrItems, buttonId) {
        let title, imageSrc, description, items;

        if (categoryOrItems.items) {
            // This is the ownedItems object
            title = categoryOrItems.name;
            imageSrc = './';  // Default or category-specific image
            description = 'You own these items';
            items = categoryOrItems.items;  // Access the items property directly
        } else {
            // This is a category
            title = categoryOrItems.name;
            imageSrc = './';
            description = 'You’ve got all ' + categoryOrItems.name;
            items = categoryOrItems.items; // Get items from the category
        }

        // Update content
        updateContent(title, imageSrc, items, description, categoryOrItems);

        // Hide and show buttons
        if (lastVisibleButtonId) {
            document.getElementById(lastVisibleButtonId).classList.remove('hidden');
        }

        document.getElementById(buttonId).classList.add('hidden');

        lastVisibleButtonId = buttonId;
    }


    function updateContent(title, imageSrc, items, description, category) {
        document.getElementById('category-title').textContent = title;

        // Update all items dynamically
        const content = document.getElementById('category-content');
        content.innerHTML = ''; // Clear existing content

        // Add the items dynamically (assuming each category has at least one item)
        items.forEach((item, index) => {
            const itemElement = document.createElement('div');

            
            const isActive = item.pivot && item.pivot.active === 1 ? true : false;

            itemElement.innerHTML = `
            <form action="/buy-item" method="POST" id="form-${item.id}">
                @csrf
                <input type="hidden" name="item_id" value="${item.id}">

                <div class="${isActive ? 'border-green-500' : ''} relative rounded-[11px] bg-transparent border border-[#797272] p-[8px] w-[60px] h-[60px] flex items-center place-items-center place-content-center justify-center" onclick="submitForm(${item.id})">
                    <img src="/images/smoggy/${imageSrc}${item.image}" alt="${item.name}" class="object-cover">                    
                </div>

                <div>
                  <button class="rounded-[100px] w-[10px] h-[10px] border border-black bg-[#e0e2e2]"></button>
                  <button class="rounded-[100px] w-[10px] h-[10px] border border-black bg-[#f48e90]"></button>
                  <button class="rounded-[100px] w-[10px] h-[10px] border border-black bg-[#9fd18c]"></button>
                </div>

                <p class="text-[15px] font-bold text-black/40">${item.name}</p>
                <div class="px-[5px] w-[60px] flex flex-row gap-[19px] place-items-center place-content-center justify-center">
                    <p class="text-[10px] text-center text-semibold text-black/40">${category.name}</p>
                    <div class="p-[2px]">
                        <div class="flex flex-row gap-[3px] rounded-sm bg-transparent border-[0.3px] border-[#626262] px-[9px] py-[3px] place-items-center place-content-center justify-center">
                            <p class="text-[7px] font-light text-[#626262]">${item.points}</p>
                            <img src="/images/coin_image/Group 57.png" alt="" class="w-[10px] h-[10px]">
                            </div>
                    </div>
                </div>
            </form>
            `;
            

            content.appendChild(itemElement);
        });
    }


function submitForm(itemId) {
    const form = document.getElementById(`form-${itemId}`);
    form.submit();  // Submit the form
}


function purchaseItem(itemId) {
    // Send a request to the server to buy the item
    fetch('/buy-item', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For CSRF protection
        },
        body: JSON.stringify({ item_id: itemId }) // Send the item ID to the server
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item successfully purchased!');
        } else {
            alert('Failed to purchase item. ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error purchasing item:', error);
        alert('There was an error processing your purchase.');
    });
}

// Default content initialization (Specials)
updateContent('Specials', './specials.png', [], 'You’ve got all specials');

      </script>

      {{-- <script>
        let lastVisibleButtonId = 'button-specials';
      
        function switchCategory(title, imageSrc, name, description, buttonId) {
          
          updateContent(title, imageSrc, name, description);
      
          if (lastVisibleButtonId) {
            document.getElementById(lastVisibleButtonId).classList.remove('hidden');
          }

          document.getElementById(buttonId).classList.add('hidden');
      
          lastVisibleButtonId = buttonId;
        }
    
          function updateContent(title, imageSrc, name, description) {
              document.getElementById('category-title').textContent = title;

            // Update all items dynamically
            const content = document.getElementById('category-content');
            content.innerHTML = ''; // Clear existing content

            // Add new items (12 total for 4 rows x 3 columns)
            for (let i = 1; i <= 12; i++) {
                const item = document.createElement('div');

                // Item content
                item.innerHTML = `
                <div class="rounded-[11px] bg-transparent border border-[#797272] p-[8px] w-[60px] h-[60px] flex items-center place-items-center place-content-center justify-center">
                    <img src="${imageSrc}" alt="" class="">
                </div>
                <div class="mt-[3px] flex flex-row gap-[3px]">
                    <div class="rounded-full bg-[#FFD700] w-[8px] h-[8px]"></div>
                    <div class="rounded-full bg-[#FFD700] w-[8px] h-[8px]"></div>
                    <div class="rounded-full bg-[#FFD700] w-[8px] h-[8px]"></div>
                </div>
                <p class="text-[15px] font-bold text-black/40">${name} ${i}</p>
                <div class="w-[70px] flex flex-row gap-[19px] place-items-center place-content-center justify-center">
                    <p class="text-[10px] text-center text-semibold text-black/40">Test</p>
                    <div class="p-[2px]">
                    <div class="flex flex-row gap-[3px] rounded-sm bg-transparent border-[0.3px] border-[#626262] px-[9px] py-[3px] place-items-center place-content-center justify-center">
                        <p class="text-[7px] font-light text-[#626262]">25</p>
                        <img src="./coin-spng.png" alt="" class="w-[10px] h-[10px]">
                    </div>
                    </div>
                </div>
                `;
                content.appendChild(item);
            }
            }
      
        // Default content initialization (Specials)
        updateContent('Specials', './specials.png', 'Special', 'You’ve got all specials');
      </script> --}}
      
      <style>
        .hidden {
          display: none;
        }
      </style>
      
    </body>
</html>