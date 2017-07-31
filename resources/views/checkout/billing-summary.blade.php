<div class="card">
 <div class="header">
                                    <h4 class="title">Cart Summary</h4>
                                </div>
                                <div class="content">
                                    <p class="category">The total cost is inclusive of tax, delivery and service charge.</p>
                                    <ul class="p-l-0 list-style-none">
                                        <li>
                                            <hr>
                                        </li>
                                        <li>
                                            <p class="menus">
                                                <span>Your Basket</span>
                                                <span class="pull-right"> 
                                                    &#8358;
                                                    <span class="cash">{{number_format($basket['sub_total'], 2)}}</span>
                                                </span>
                                            </p>
                                        </li>
                                        
                                        <li>
                                            <p class="menus">
                                                <span> {{ isset($charge) ? $charge [1] : ""}}% Service charge</span>
                                                <span class="pull-right"> 
                                                    &#8358;
                                                    <span class="cash">{{number_format($basket['taxes']['service_charge'], 2)}}</span>
                                                </span>
                                            </p>
                                        </li>
                                        
                                        <li>
                                            <p class="menus">
                                                <span>Delivery Charge</span>
                                                <span class="pull-right"> 
                                                    &#8358;
                                                    <span class="cash">{{number_format($basket['taxes']['delivery_fee'], 2)}}</span>
                                                </span>
                                            </p>
                                        </li>
                                        @if(isset($options['slot']))
                                        <li>
                                            <p class="menus">
                                                <span>Delivery Slot</span>
                                                <span class="pull-right"> 
                                                    <span class="cash">
                                                        {{$options['slot']['time_range']}}, {{date('l d M', strtotime($options['delivery_date']))}}
                                                    </span>
                                                </span>
                                            </p>
                                        </li>
                                        @endif
                                        <li>
                                            <hr>
                                        </li>
                        
                                        <li>
                                            <p class="menus">
                                                <span>Total Due</span>
                                                <span class="pull-right c-brand-green f-20"> 
                                                    &#8358;
                                                    <span class="cash">{{number_format($basket['total'], 2)}}</span>
                                                </span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>