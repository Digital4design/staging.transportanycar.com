<style>
    .save-search-content {
        padding: 35px !important;
    }

    .save-search-title {
        font-weight: 500 !important;
        margin: initial !important;
    }

    .save-search-example {
        font-size: 15px;
        font-weight: 400;
        color: #909090;
        margin: 12px 0 12px;
    }

    .save-search-email {
        font-size: 14px;
        font-weight: 300;
        color: #000000;
    }

    .save-search-email input[type="checkbox"] {
        left: 0;
        top: 4px;
    }

    .get_quote .modal-footer p {
        font-size: 14px !important;
        font-weight: 300;
        color: #000000;
        margin-bottom: 28px !important;
    }

    .submit_btn {
        font-size: 20px;
        font-weight: 400;
        color: #ffffff;
        padding: 10px 50px !important;
    }

    .save-search-textarea {
        font-size: 20px;
        font-weight: 300;
        color: #000000;
        height: 54px;
        border-radius: 5px;
        border: 2px solid #CFCFCF;
        font-family: 'Outfit', sans-serif;
    }
    .save-search-textarea:focus {
        border-color: #52D017;
        box-shadow: 0 0 0 .2rem rgb(82 208 23 / 25%);
    }

    .save-search-textarea::-webkit-input-placeholder {
        color: #000000;
        opacity: 0.3;
        font-family: 'Outfit', sans-serif;
    }

    .save-search-textarea::-moz-placeholder {
        color: #000000;
        opacity: 0.3;
        font-family: 'Outfit', sans-serif;
    }

    .save-search-textarea:-ms-input-placeholder {
        color: #000000;
        opacity: 0.3;
        font-family: 'Outfit', sans-serif;
    }

    .save-search-textarea:-moz-placeholder {
        color: #000000;
        opacity: 0.3;
        font-family: 'Outfit', sans-serif;
    }

    /**/
    /* Hide the default checkbox */
    .custom-checkbox input[type="checkbox"] {
        display: none;
    }

    /* Create custom checkbox */
    .custom-checkbox input[type="checkbox"]+label::before {
        content: "";
        display: inline-block;
        width: 14px;
        height: 14px;
        border: 1px solid #52D017;
        border-radius: 3px;
        margin-right: 5px;
        margin-top: -4px;
        vertical-align: middle;
        transition: background-color 0.3s ease;
    }

    /* Checked state */
    .custom-checkbox input[type="checkbox"]:checked+label::before {
        background-color: #52D017;
        border-color: #52D017;
    }

    /* Add checkmark */
    .custom-checkbox input[type="checkbox"]:checked+label::after {
        content: " ";
        color: #ffffff;
        font-size: 12px;
        position: absolute;
        left: 2px;
        top: 5px;
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMjUuMDAwMDAwcHQiIGhlaWdodD0iMjI1LjAwMDAwMHB0IiB2aWV3Qm94PSIwIDAgMjI1LjAwMDAwMCAyMjUuMDAwMDAwIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0Ij4KPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMjI1LjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIgZmlsbD0iI2ZmZmZmZiIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTE1MTQgMTY2MyBjLTIxNCAtMjE5IC00NTIgLTQ2MyAtNTMwIC01NDIgbC0xNDIgLTE0NSAtMTk5IDE5MWMtMTA5IDEwNCAtMjIwIDIwOSAtMjQ2IDIzMyBsLTQ4IDQ0IC0xNzAgLTE3MCBjLTkzIC05MyAtMTY5IC0xNzIgLTE2OSAtMTc2IDAgLTExIDgyMSAtODAzIDgzMyAtODAzIDcgMCAyNjEgMjU0IDU2NiA1NjUgMzA1IDMxMSA2MTkgNjMwIDY5OCA3MTAgbDE0MyAxNDUgLTE3MyAxNzMgLTE3NCAxNzMgLTM4OS0zOTh6Ii8+CjwvZz4KPC9zdmc+Cg==');
        background-size: contain;
        background-repeat: no-repeat;
        width: 10px;
        height: 10px;
    }

    .custom-checkbox label {
        position: relative;
        cursor: pointer;
    }
</style>
<div class="modal get_quote fade" id="saveSrchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content save-search-content">
            <div class="modal-header">
                <h5 class="modal-title save-search-title" id="exampleModalLongTitle">Save this search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
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
                        <input type="text" class="form-control textarea save-search-textarea"
                            style="margin-bottom:0px" aria-describedby="emailHelp" placeholder="Name this search"
                            id="srchName" name="srchName">
                        <p class="save-search-example">e.g. (London to Anywhere)</p>
                    </div>
                    <div class="form-group custom-checkbox">
                        <input class="form-check-input m-0 position-absolute" type="checkbox" value="true"
                            id="emailNtf" name="emailNtf">
                        <label class="form-check-label save-search-email position-relative" for="emailNtf">
                            Get emails for jobs that match this search.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="mt-0 mx-0">You can save your most popular searches and opt in to receive emails for jobs
                        that match this
                        search.</p>
                    <button type="submit" class="submit_btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
