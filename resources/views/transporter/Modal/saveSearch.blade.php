<style>
.save-search-content {
    padding: 35px!important;
}
.save-search-title {
        font-weight: 500 !important;
        margin: initial !important;
    }
    .save-search-example {
        font-size: 15px;
        font-weight: 400;
        color:#909090;
        margin: 12px 0 28px;
    }
    .save-search-email {
        font-size: 14px;
        font-weight: 300;
        color:#000000;
    }
    .save-search-email input[type="checkbox"]{
        left: 0;
        top: 4px;
    }
    .get_quote .modal-footer p {
        font-size: 14px!important;
        font-weight: 300;
        color:#000000;
        margin-bottom: 28px!important;
    }
    .submit_btn {
        font-size: 20px;
        font-weight: 400;
        color:#ffffff;
        padding:10px 50px !important;
    }
    input[type="text"] {
        font-size: 20px;
        font-weight: 300;
        color:#000000;
        opacity: 0.3;
        height: 54px;
        border-radius: 5px;
        border: 2px solid #CFCFCF;
    }
    input[type="checkbox"]:checked {
            background-color: #52D017;
            border-color: #52D017;
        }
</style>
<div class="modal get_quote fade" id="saveSrchModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content save-search-content">
            <div class="modal-header">
                <h5 class="modal-title save-search-title" id="exampleModalLongTitle">Save this search</h5>
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
                        <p class="save-search-example">e.g. (London to Anywhere)</p> 
                    </div>
                    <div class="form-group">
                        <label class="form-check-label save-search-email position-relative pl-3" for="emailNtf">
                            <input class="form-check-input m-0 position-absolute" type="checkbox" value="true" id="emailNtf" name="emailNtf">
                            Get emails for jobs that match this search.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="mt-0 mx-0">You can save your most popular searches and opt in to receive emails for jobs that match this
                        search.</p>
                    <button type="submit" class="submit_btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>