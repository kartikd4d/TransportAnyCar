<div class="modal get_quote fade" id="saveSrchModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Edit your bid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                fill="#000" />
                        </svg>
                    </span>
                </button>
            </div>
            <form id="saveSrchForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control textarea" style="margin-bottom:0px" aria-describedby="emailHelp"
                            placeholder="Name this search" id="srchName" name="srchName">
                        <p style="font-size:12px; margin-top: 10px;">e.g. (London to Anywhere)</p> 
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="true" id="emailNtf" name="emailNtf">
                        <label class="form-check-label" for="flexCheckDefault">
                            Get emails for jobs that match this search.
                        </label>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 10px;">
                    <p>You can save your most popular searches and opt in to receive emails for jobs that match this
                        search.</p>
                    <button type="submit" class="submit_btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>