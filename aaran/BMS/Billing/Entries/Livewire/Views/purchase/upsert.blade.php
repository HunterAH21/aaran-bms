<div>
    <x-slot name="header">Purchase</x-slot>
    {{--    <x-Ui::forms.m-panel>--}}
    <x-Ui::alerts.notification/>

    <div class="pt-4 min-h-[40rem]">
        <div class="space-y-3">
            <div class="max-w-7xl mx-auto">
                <x-Ui::tabs.tab-panel>
                    <x-slot name="tabs">
                        <x-Ui::tabs.tab>Details</x-Ui::tabs.tab>
                        <x-Ui::tabs.tab>Address</x-Ui::tabs.tab>
                        <x-Ui::tabs.tab>E-way Bill Details</x-Ui::tabs.tab>
                        <x-Ui::tabs.tab>Additional Charges</x-Ui::tabs.tab>
                        <x-Ui::tabs.tab>Terms</x-Ui::tabs.tab>
                    </x-slot>
                    <x-slot name="content">

                        <!--  TAB 1 - Details ------------------------------------------------------------------------------------------------->

                        <x-Ui::tabs.content>

                            <div class="space-y-5 py-3">
                                <div class="w-full sm:flex-row flex-col flex gap-5 ">

                                    <div class="w-full space-y-5">

                                        <div>
                                            @livewire('master::contact.lookup',['initId' => $purchase->contact_id] )
                                            <x-Ui::input.error-text wire:model="purchase.contact_id"/>
                                        </div>

                                        <div>
                                            @if(\Aaran\Assets\Features\SaleEntry::hasOrder())
                                                @livewire('master::order.lookup',['initId' => $purchase->order_id])
                                                <x-Ui::input.error-text wire:model="purchase.order_id"/>
                                            @endif
                                        </div>

                                        <div>

                                            @if(\Aaran\Assets\Features\SaleEntry::hasStyle())
                                                @livewire('master::style.lookup',['initId' => $purchase->order_id])
                                                <x-Ui::input.error-text wire:model="purchase.style_id"/>
                                            @endif
                                        </div>

                                        <div>
                                            <x-Ui::input.floating wire:model="purchase.purchase_no" label="Purchase No"/>
                                            <x-Ui::input.error-text wire:model="purchase.purchase_no"/>
                                        </div>
                                        <div>
                                            <x-Ui::input.model-date wire:model="purchase.purchase_date"
                                                                    label="Purchase Date"/>
                                            <x-Ui::input.error-text wire:model="purchase.purchase_date"/>
                                        </div>
                                    </div>

                                    <div class="w-full space-y-5 ">
                                        <div>
                                            <x-Ui::input.floating wire:model="purchase.entry_no" label="Invoice No"/>
                                            <x-Ui::input.error-text wire:model="purchase.entry_no"/>
                                        </div>
                                        <div>
                                            <x-Ui::input.model-date wire:model="purchase.entry_date"
                                                                    label="Invoice Date"/>
                                            <x-Ui::input.error-text wire:model="purchase.entry_date"/>
                                        </div>
                                        <div>
                                            <x-Ui::input.model-select wire:model="purchase.purchase_type"
                                                                      :label="'Purchase Type'">
                                                <option value="0" class="text-gray-400"> choose ..</option>
                                                <option value="1">CGST-SGST</option>
                                                <option value="2">IGST</option>
                                            </x-Ui::input.model-select>
                                            <x-Ui::input.error-text wire:model="purchase.purchase_type"/>
                                        </div>
                                        <div>
                                            @if(\Aaran\Assets\Features\SaleEntry::hasJob_no())
                                                <x-Ui::input.floating wire:model="purchase.job_no" label="Job No"/>
                                            @endif
                                        </div>
                                        <div>
                                            @if(\Aaran\Assets\Features\SaleEntry::hasBundle())
                                                <x-Ui::input.floating wire:model="purchase.bundle" label="Bundle"/>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <!-- Add purchase item ------------------------------------------------------------------------------------------------->

                                <div
                                    class="px-4 pb-4  text-lg font-merri tracking-wider text-orange-600 underline underline-offset-4 underline-orange-500">
                                    Purchase Items
                                </div>

                                <div class="bg-white border-2 rounded-2xl border-green-300 md:border-0 p-3 md:p-0 ">
                                <div class="w-full flex sm:flex-row gap-3 flex-col gap-x-1 pb-4">

                                    @if(\Aaran\Assets\Features\SaleEntry::hasPo_no())
                                        <div class="w-full">
                                            <x-Ui::input.floating id="qty" wire:model="purchaseItems.po_no" label="Po No"/>
                                        </div>
                                    @endif
                                    @if(\Aaran\Assets\Features\SaleEntry::hasDc_no())
                                        <div class="w-full">
                                            <x-Ui::input.floating id="dc" wire:model="purchaseItems.dc_no" label="DC No."/>
                                        </div>
                                    @endif

                                    <div class="w-full">
                                        @livewire('master::product.lookup',['initId' => $purchaseItems->product_id])
                                    </div>

                                    @if(\Aaran\Assets\Features\SaleEntry::hasProductDescription())
                                        <div class="w-full">
                                            <x-Ui::input.floating id="description" wire:model="purchaseItems.description"
                                                                  label="description"/>
                                        </div>
                                    @endif
                                    @if(\Aaran\Assets\Features\SaleEntry::hasColour())
                                        <div class="w-full">
                                            @livewire('common::lookup.colour',['initId' => $purchaseItems->colour_id])
                                        </div>
                                    @endif
                                    @if(\Aaran\Assets\Features\SaleEntry::hasSize())
                                        <div class="w-full">
                                            @livewire('common::lookup.size',['initId' => $purchaseItems->size_id])
                                        </div>
                                    @endif
                                    @if(\Aaran\Assets\Features\SaleEntry::hasNo_of_roll())
                                        <div class="w-full">
                                            <x-Ui::input.floating id="no_of_roll" wire:model="purchaseItems.no_of_roll"
                                                                  label="No of Roll"/>
                                        </div>
                                    @endif
                                    <div class="w-full">
                                        <x-Ui::input.floating id="qty" wire:model="purchaseItems.qty" label="Quantity"/>
                                    </div>
                                    <div class="w-full">
                                        <x-Ui::input.floating id="price" wire:model="purchaseItems.price" label="Price"/>
                                    </div>
                                    <x-Ui::button.add class="w-full" wire:click.prevent="addItems"/>
                                </div>
                                </div>

                                <!--  purchase item table ------------------------------------------------------------------------------------------------->


                                <div class="max-w-7xl mx-auto">
                                    <div class="w-full border rounded-lg overflow-hidden overflow-x-auto">
                                        <table class="table-auto min-w-full text-xs whitespace-nowrap">
                                            <tr class="bg-neutral-50  text-neutral-400 border-b font-medium font-sans tracking-wider dark:bg-dark-3 dark:text-dark-9">
                                                <th class="py-4 border-r min-w-[50px]">#</th>
                                                @if(\Aaran\Assets\Features\SaleEntry::hasPo_no())
                                                    <th class="border-r min-w-[100px]">PO</th>
                                                @endif
                                                @if(\Aaran\Assets\Features\SaleEntry::hasDc_no())
                                                    <th class="border-r min-w-[100px]">DC</th>
                                                @endif

                                                <th class="border-r max-w-[150px] truncate">Items</th>

                                                @if(\Aaran\Assets\Features\SaleEntry::hasColour())
                                                    <th class="border-r min-w-[100px]">Color</th>
                                                @endif
                                                @if(\Aaran\Assets\Features\SaleEntry::hasSize())
                                                    <th class="border-r min-w-[100px]">Size</th>
                                                @endif
                                                @if(\Aaran\Assets\Features\SaleEntry::hasNo_of_roll())
                                                    <th class="border-r min-w-[100px]">No 0f Rolls</th>
                                                @endif
                                                <th class="border-r min-w-[100px]">Quantity</th>
                                                <th class="border-r min-w-[100px]">Rate</th>
                                                <th class="border-r min-w-[100px]">Taxable</th>
                                                <th class="border-r min-w-[80px]">GST Percent</th>
                                                <th class="border-r min-w-[100px]">GST</th>
                                                <th class="border-r min-w-[150px]">Sub Total</th>
                                                <th >Action</th>
                                            </tr>
                                            @if ($purchase->itemList)
                                                @foreach($purchase->itemList as $index => $row)
                                                    <tr class="text-center border-b font-lex tracking-wider hover:bg-amber-50 dark:hover:bg-dark-4 dark:bg-dark-3 dark:text-dark-9">
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{(int)$index+1}}</td>
                                                        @if(\Aaran\Assets\Features\SaleEntry::hasPo_no())
                                                            <td class="py-2 border-r min-w-[100px]"
                                                                wire:click.prevent="changeItems({{$index}})">{{$row['po_no']}}</td>
                                                        @endif
                                                        @if(\Aaran\Assets\Features\SaleEntry::hasDc_no())
                                                            <td class="py-2 border-r min-w-[100px]"
                                                                wire:click.prevent="changeItems({{$index}})">{{$row['dc_no']}}</td>
                                                        @endif

                                                        <td class="py-2 border-r text-left px-2 w-[150px] truncate"
                                                            wire:click.prevent="changeItems({{$index}})">
                                                            <div class="line-clamp-1  w-[150px] truncate">{{$row['product_name']}}
                                                                @if(\Aaran\Assets\Features\SaleEntry::hasProductDescription() && !empty($row['description']))
                                                                    &nbsp;-&nbsp; {{ $row['description'] }}
                                                                @endif
                                                            </div>
                                                        </td>
                                                        @if(\Aaran\Assets\Features\SaleEntry::hasColour())
                                                            <td class="py-2 border-r min-w-[100px]"
                                                                wire:click.prevent="changeItems({{$index}})">{{$row['colour_name']}}</td>
                                                        @endif
                                                        @if(\Aaran\Assets\Features\SaleEntry::hasSize())
                                                            <td class="py-2 border-r min-w-[100px]"
                                                                wire:click.prevent="changeItems({{$index}})">{{$row['size_name']}}</td>
                                                        @endif

                                                        @if(\Aaran\Assets\Features\SaleEntry::hasNo_of_roll())
                                                            <td class="py-2 border-r min-w-[100px]"
                                                                wire:click.prevent="changeItems({{$index}})">{{$row['no_of_roll']}}</td>
                                                        @endif

                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{$row['qty']}}</td>
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{$row['price']}}</td>
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{ \Aaran\Assets\Helper\Format::Decimal($row['taxable'])}}</td>
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{$row['gst_percent']}}</td>
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{\Aaran\Assets\Helper\Format::Decimal($row['gst_amount'])}}</td>
                                                        <td class="py-2 border-r min-w-[100px]"
                                                            wire:click.prevent="changeItems({{$index}})">{{\Aaran\Assets\Helper\Format::Decimal($row['subtotal'])}}</td>
                                                        <td class="py-2 border-r min-w-[150px]"
                                                            wire:click.prevent="changeItems({{$index}})">
                                                            <x-Ui::button.delete
                                                                wire:click.prevent="removeItems({{$index}})"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif


                                            <!--  Bottom Total ------------------------------------------------------------------------------------------------->


                                            <tr class="bg-neutral-50 text-neutral-400 text-center font-sans tracking-wider dark:bg-dark-3 dark:text-dark-9">

                                                @if (\Aaran\Assets\Features\SaleEntry::hasNo_of_roll() && \Aaran\Assets\Features\SaleEntry::hasSize() && \Aaran\Assets\Features\SaleEntry::hasColour())
                                                    <td class="py-2 border-r" colspan="7">TOTALS.</td>
                                                @elseif (\Aaran\Assets\Features\SaleEntry::hasSize() && \Aaran\Assets\Features\SaleEntry::hasColour())
                                                    <td class="py-2 border-r" colspan="6">TOTALS.</td>
                                                @else
                                                    <td class="py-2 border-r" colspan="4">TOTALS.</td>
                                                @endif

                                                <td class="border-r font-semibold">{{$purchase->total_qty ??'' }}</td>
                                                <td class="border-r">&nbsp;</td>
                                                <td class="border-r font-semibold">{{\Aaran\Assets\Helper\Format::Decimal($purchase->total_taxable)}}</td>
                                                <td class="border-r">&nbsp;</td>
                                                <td class="border-r font-semibold">{{ \Aaran\Assets\Helper\Format::Decimal($purchase->total_gst)}}</td>
                                                <td class="border-r font-semibold">{{\Aaran\Assets\Helper\Format::Decimal($grandTotalBeforeRound)}}</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--  Bottom Total ------------------------------------------------------------------------------------------------->

                            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start gap-5 py-10 px-4">
                                <div class="w-full sm:w-2/3">
                                    @if(isset($e_invoiceDetails->id))
                                        <div class="w-full flex flex-col items-center justify-center">
                                            <img class="w-[200px] mx-auto"
                                                 src="{{\App\Helper\qrcoder::generate($e_invoiceDetails->signed_qrcode,22)}}"
                                                 alt="{{$e_invoiceDetails->signed_qrcode}}">
                                            <div class="w-full text-center">Irn No: {{$e_invoiceDetails->irn}}</div>
                                            @if(isset($e_wayDetails))
                                                <div class="w-full text-center">E-way Bill NO: {{$e_wayDetails->ewbno}}</div>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="w-full sm:w-1/3 flex text-xs text-400 px-2 sm:px-4">
                                    <div class="w-1/2 space-y-4 text-gray-400 font-merri tracking-wider">
                                        <div>Taxable No</div>
                                        <div>GST</div>
                                        <div>Round off</div>
                                        <div class="font-semibold">Grand Total</div>
                                    </div>
                                    <div class="w-1/6 text-center space-y-4">
                                        <div>:</div>
                                        <div>:</div>
                                        <div>:</div>
                                        <div>:</div>
                                    </div>
                                    <div class="w-1/3 text-end space-y-4 tracking-wider font-lex">
                                        <div>{{$purchase->total_taxable ? \Aaran\Assets\Helper\Format::Decimal($purchase->total_taxable):'-'}}</div>
                                        <div>{{$purchase->total_gst ? \Aaran\Assets\Helper\Format::Decimal($purchase->total_gst):'-'}}</div>
                                        <div>{{ ($purchase->round_off == 0 || is_null($purchase->round_off)) ? '-' : $purchase->round_off }}</div>
                                        <div class="font-semibold">{{$purchase->grand_total ? \Aaran\Assets\Helper\Format::Decimal($purchase->grand_total):''}}</div>
                                    </div>
                                </div>
                            </div>

                        </x-Ui::tabs.content>

                        <!--  TAB 2 - Address ------------------------------------------------------------------------------------------------->

                        <x-Ui::tabs.content>
                            <div class="sm:w-1/2 space-y-5 h-52 pt-3">
                                <div>
                                    @if(\Aaran\Assets\Features\SaleEntry::hasBillingAddress())
                                        @livewire('master::contact.billing-address', ['initId' => $purchase->billing_id])
                                        <x-Ui::input.error-text wire:model="purchase.billing_id"/>
                                    @endif
                                </div>
                                <div>
                                    @if(\Aaran\Assets\Features\SaleEntry::hasShippingAddress())
                                        @livewire('master::contact.shipping-address', ['initId' => $purchase->shipping_id])
                                        <x-Ui::input.error-text wire:model="purchase.shipping_id"/>
                                    @endif
                                </div>

                            </div>
                        </x-Ui::tabs.content>

                        <!--  TAB 3 - Eway details ------------------------------------------------------------------------------------------------->

                        <x-Ui::tabs.content>
                            <div>
                                <div class="flex sm:flex-row flex-col justify-between sm:gap-5 pt-3">

                                    <div class="w-full space-y-5 ">

                                        @if(\Aaran\Assets\Features\SaleEntry::hasTransport())
                                            @livewire('common::lookup.transport',['initId' => $purchase->trans_id])
                                        @endif

                                        <x-Ui::input.floating wire:model.live="purchase.trans_docs" label="Doc No"/>
                                        <x-Ui::input.error-text wire:model="purchase.trans_docs"/>

                                        <x-Ui::input.model-date wire:model="purchase.trans_docs_dt" label="Transport Date"/>
                                        <x-Ui::input.error-text wire:model="purchase.trans_docs_dt"/>

                                        <x-Ui::input.model-select wire:model="purchase.trans_mode" label="Transport Mode">
                                            <option value="">Choose..</option>
                                            <option value="1">Road</option>
                                            <option value="2">Rail</option>
                                            <option value="3">Air</option>
                                            <option value="4">ship</option>
                                        </x-Ui::input.model-select>
                                        <x-Ui::input.error-text wire:model="purchase.trans_mode"/>

                                    </div>

                                    <div class="w-full space-y-5">
                                        <div>
                                            <x-Ui::input.floating wire:model.live="purchase.distance" label="Distance"/>
                                            <x-Ui::input.error-text wire:model="purchase.distance"/>
                                        </div>

                                        <x-Ui::input.model-select wire:model="purchase.veh_type" label="Vechile Type">
                                            <option value="">Choose..</option>
                                            <option value="R">Regular</option>
                                            <option value="O">ODC</option>
                                        </x-Ui::input.model-select>
                                        <x-Ui::input.error-text wire:model="purchase.veh_type"/>

                                        <div>
                                            <x-Ui::input.floating wire:model.live="purchase.veh_no" label="Vehicle No"/>
                                            <x-Ui::input.error-text wire:model="purchase.veh_no"/>
                                        </div>

                                        <div>&nbsp;</div>


                                    </div>

                                </div>
                            </div>
                        </x-Ui::tabs.content>

                        <!--  TAB 4 - Additional ------------------------------------------------------------------------------------------------->

                        <x-Ui::tabs.content>
                            <div class="sm:w-1/2 space-y-5 h-52 pt-3">
                                <!-- Ledger ----------------------------------------------------------------------------------->

                                @livewire('books::lookup.ledger',['initId' => $purchase->ledger_id])

                                <x-Ui::input.floating wire:model="purchase.additional" wire:change.debounce="calculateTotal"
                                                      label="Addition"
                                                      class="text-right block px-2.5 pb-2.5 pt-4 w-full text-sm
                                                      text-gray-900 bg-transparent rounded-lg border-1
                                                       border-gray-300 appearance-none
                                                       focus:outline-none focus:ring-2 focus:ring-cyan-50 focus:border-blue-600 peer"/>
                            </div>
                        </x-Ui::tabs.content>

                        <!--  TAB 5 - Terms ------------------------------------------------------------------------------------------------->

                        <x-Ui::tabs.content>
                            <div class="sm:w-1/2">
                                <x-Ui::input.rich-text wire:model="purchase.term" placeholder="Terms & Conditions"/>
                            </div>
                        </x-Ui::tabs.content>

                    </x-slot>
                </x-Ui::tabs.tab-panel>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            @if( $vid != "")
                <x-Ui::forms.m-panel-bottom-button save back/>
            @else
                <x-Ui::forms.m-panel-bottom-button save print back/>
            @endif
        </div>
    </div>
    {{--    </x-Ui::forms.m-panel>--}}
</div>
