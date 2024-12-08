//
//     let variantIndex = 1;
//     function addVariant(){
//     const variantTemplate = `
//             <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
//
//         <div class="xl:col-span-4">
//             <label for="productPrice" class="inline-block mb-2 text-base font-medium">Price</label>
//             <input type="number" name="price" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="$0.00" required="">
//         </div>
//
//         <div class="xl:col-span-4">
//             <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Discounts</label>
//             <input type="number" name="price_sale" id="productDiscounts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="0%" required="">
//         </div>
//
//         <div class="xl:col-span-4">
//             <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Quantity</label>
//             <input type="number" id="qualityInput" name="quantity" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Quantity" required="">
//         </div>
//
//
//         <div class="xl:col-span-4">
//             <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Color</label>
//             <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="product_color_id" id="categorySelect">
//                 <option value="">Select Color</option>
// @foreach($color as $list)
//         <option value="{{ $list->id }}">{{ $list->name }}</option>
//                                                 @endforeach
//         </select>
//     </div>
//
//
//         <div class="xl:col-span-4">
//         <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Size</label>
//         <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="product_size_id" id="categorySelect">
//             <option value="">Select Size</option>
//         @foreach($size as $list)
//             <option value="{{ $list->id }}">{{ $list->name }}</option>
//         @endforeach
//         </select>
//     </div>
//         <!--end col-->
// </div>
// `;
//     document.getElementById('variants').insertAdjacentHTML('beforeend', variantTemplate);
//     variantIndex++;
// }
