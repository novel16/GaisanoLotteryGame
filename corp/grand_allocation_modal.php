
    <!-- update -->

    <div class="modal fade " id="grandUpdate" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Allocation Day</h4>
                    <button type="button" class ="btn-close btn-sm"  data-bs-dismiss="modal" aria-bs-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="grand_allocation_func.php" method="POST">
                        <div class="form-group mt-3">
                            <label for="" class="control-label">ID</label>
                            <input type="text" class="form-control" readonly name="id" id="id" placeholder="" required>
                        </div>
                        
                        <div class="form-group mt-3 mb-3">
                            <label for="">Day</label>
                            <select name="modal_day" id="modal_day" class = "form-select">   
                                <option selected id="modal_day_val" ></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                
                            </select>
                        </div>
                        
                    
                </div>
                <div class="modal-footer d-flex justify-content-between ">
                    <button type="submit" name="update" onclick="return confirm('Are you sure? You want to update this allocation day?')"  class="modal-btn-primary btn-primary " >Update</button>
                    <button type="button" class="modal-btn-danger btn-danger " data-bs-dismiss="modal" aria-bs-label>Cancel</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    

     <!-- delete -->

     <div class="modal fade " id="grandDelete" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Allocation Day</h4>
                    <button type="button" class ="btn-close btn-sm"  data-bs-dismiss="modal" aria-bs-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="grand_allocation_func.php" method="POST">
                        
                            <input hidden type="text" class="form-control" readonly name="id" id="delete_id" placeholder="" required>
                        
                        
                        <div class="form-group mt-3 mb-3 d-flex flex-column justify-content-center align-items-center">
                            <h6 class="text-center" style="font-size: 1.5rem; font-weight: 400;">Delete Allocation Day?</h6>
                            <h4 id="modal_day_delete"></h4>
                        </div>
                        
                    
                </div>
                <div class="modal-footer d-flex justify-content-between ">
                    <button type="button" class="modal-btn-cancel btn-danger " data-bs-dismiss="modal" aria-bs-label>Cancel</button>
                    <button type="submit" name="delete"  class="modal-btn-danger btn-primary " >Delete</button>
                    
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    