<div id="main">
                    <form id="cForm" method="post" action="<?=uri_string()?>" class="jNice">
                    <h3>Create Auction</h3>
                    <fieldset>
                    	<legend></legend>
                            <p>
                            	<label for="name">Auction Name</label>
                                <input id="name" name="name" type="text" class="input field_text text-long" value="">
                             </p><p>
                            	 <label for="shot_url">Shot Url</label>
                                 <input type="text" id="shot_url" name="shot_url" class="field_text text-long value=""  />
                             </p><p>
                                <label for="retail_price">Retail Price</label>
                                <input type="text" id="retail_price" name="retail_price" class="field_text text-small value="" />
                              </p><p>
                                <label for="auction_price">Auction Price</label>
                                <input type="text" id="auction_price" name="auction_price" class="field_text text-small" value="" />
                              </p><p>
                                <label for="bid_increment">Bid Increment</label>
                                <input type="text" id="bid_increment" name="bid_increment" class="field_text text-small"  value="" />
                              </p><p>
                                <label for="create_time">Start Time</label>
                                <input type="text" id="create_time" name="create_time" class="field_text text-medium" readonly="readonly" value="<?=date('Y-m-d',time()) ?>"   />
                              </p><p>
                                <label for="end_time">End Time</label>
                                <input type="text" id="end_time" name="end_time" class="field_text text-medium" readonly="readonly" value=""   />
                              </p><p>
                                <label for="description">Auction Description</label>
                              </p><p>
                                <textarea id="description" name="description" style="height:80px;overflow: auto"></textarea>
                              </p>
                              
                              <input name="submit" type="submit" value="Submit" />

                    </fieldset>
                    </form>

                    <form action="" class="jNice">
					<h3>Sample section</h3>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td>Vivamus rutrum nibh in felis tristique vulputate</td>
                                <td class="action"><a href="#" class="view">View</a><a href="#" class="edit">Edit</a><a href="#" class="delete">Delete</a></td>
                            </tr>
							<tr class="odd">
                                <td>Duis adipiscing lorem iaculis nunc</td>
                                <td class="action"><a href="#" class="view">View</a><a href="#" class="edit">Edit</a><a href="#" class="delete">Delete</a></td>
                            </tr>
							<tr>
                                <td>Donec sit amet nisi ac magna varius tempus</td>
                                <td class="action"><a href="#" class="view">View</a><a href="#" class="edit">Edit</a><a href="#" class="delete">Delete</a></td>
                            </tr>
							<tr class="odd">
                                <td>Duis ultricies laoreet felis</td>
                                <td class="action"><a href="#" class="view">View</a><a href="#" class="edit">Edit</a><a href="#" class="delete">Delete</a></td>
                            </tr>
							<tr>
                                <td>Vivamus rutrum nibh in felis tristique vulputate</td>
                                <td class="action"><a href="#" class="view">View</a><a href="#" class="edit">Edit</a><a href="#" class="delete">Delete</a></td>
                            </tr>
                        </table>



					<h3>Another section</h3>
                    	<fieldset>
                        	<p><label>Sample label:</label><input type="text" class="text-long" /></p>
                        	<p><label>Sample label:</label><input type="text" class="text-medium" /><input type="text" class="text-small" /><input type="text" class="text-small" /></p>
                            <p><label>Sample label:</label>
                            <select>
                            	<option>Select one</option>
                            	<option>Select two</option>
                            	<option>Select tree</option>
                            	<option>Select one</option>
                            	<option>Select two</option>
                            	<option>Select tree</option>
                            </select>
                            </p>
                        	<p><label>Sample label:</label><textarea rows="1" cols="1"></textarea></p>
                            <input  type="submit" value="Submit Query" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->