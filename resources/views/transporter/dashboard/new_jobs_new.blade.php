@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
        .jobsrch_info_list h6 {
            width: 10% !important;
        }
        .vehicle_image{
            width: 500px !important;
        }

        a.make_offer_btn {
            margin-top: 30px;
        }

        .jobsrch_top_box img {
            object-fit: cover;
            height: 272px !important;
        }
        .jobsrch_info_list li:nth-last-child(1) {
            margin-bottom: 0;
        }
        .distance_text {
            margin-bottom: 25px;
        }
        h4.distance_text strong {
            color: #898989;
        }
        .jobsrch_info_list li small {
                font-size: 15px;
                margin-left: 10px;
        }
        .jpbsrch_inner {
            width: 50%;
        }

        .jobsrch_info_list span {
            width: 50%;
        }
        .jobsrch_info_list li {
            margin-bottom: 37px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }


/* .jobsrch_form_blog .form-control {
    color: #000000;
} */
.jobsrch_form_blog .error-message {
    position: absolute;
    bottom: -34px;
    padding-left: 0;
}



.custom-navigation {
    position: absolute;
    bottom: 14px;
    left: 15px;
    color: #fff;
    font-size: 15px;
}
.jobsrch_top_box .slick-prev {
    left: 10px;
}
.jobsrch_top_box .slick-next {
    right: 10px;
}
.jobsrch_top_box .slick-next,
.jobsrch_top_box .slick-prev {
    z-index: 1;
}
.jobsrch_top_box .slick-next:before, 
.jobsrch_top_box .slick-prev:before {
    font-size: 0; display: block;
}

.jobsrch_top_box .slick-arrow.slick-disabled svg{ 
    display: none;
}


.bid_form input.form-control {
    height: auto;
    font-size: 20px;
}
.bid_form span.icon_includes {
    height: 62px;
}
.bid_form span#amount-error,
.bid_form  span#message-error {
    padding: 0;
}
.bid_form .form-group {
    position: relative;
}
.bid_form textarea.form-control.textarea {
    height: 107px;
}
.get_quote .modal-content {
    padding: 20px 30px;
    /* margin:0px 10px; */
}
.get_quote .modal-header span svg {
    margin-right: 0px;
    width: 17px;
    height: 17px;
}
.get_quote .modal-header .close {
    position: absolute;
    right: 15px;
}

/* Add your CSS styling here */
#popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border: 1px solid #ccc;
    text-align: center;
    width: 350px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 1;
    box-shadow: 0px 4px 4px 0px #00000040;
    border-radius: 8px;
}
#popup.show {
    display: block;
}
#popup img {
    width: 100%;
    margin: 20px 0;
}
#popup p {
    font-size: 20px;
    font-weight: 500;
}

.modal_current {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 7px;
}
.modal_current p {
    margin: 0;
    font-weight: normal;
    font-size: 13px;
    color: #000000d6;
}
.modal_current p span {
    color: #52D017;
}
.modal_current p span.red{
color: #0356D6;
}
.modal-footer button.submit_btn {
    text-transform: none;
}
.submit_btn {
    padding: 8px 60px !important;
    margin: 0 auto 5px;
    font-size: 19px;
}

.page-item:last-child .page-link,
.page-item:first-child .page-link {
    padding-bottom: 6px;
    padding-left: 3px;
    font-size: 20px;
}




/* start 16-09-2024 */


.job-data {
    margin-left: 0px;
    margin-bottom: 8px;
}
.job-data span {
    color: #9C9C9C;
    font-size: 15px;
}

#carDetailsModal .modal-header button.btn-close {
    position: absolute;
    top: 11px;
    right: 15px;
}
#carDetailsModal .modal-header span {
    display: flex;
    align-items: center;
    color: #9C9C9C;
    font-size: 18px;
}
#carDetailsModal .modal-header {
    border-bottom: 0;
    padding-bottom: 0;
}
#carDetailsModal .modal-header span svg {
    margin-right: 7px;
}
#carDetailsModal .modal-header button.btn-close {
    background: transparent;
    border: none;
    font-size: 22px;
    color: #9C9C9C;
    padding: 0;
    margin-left: auto;
}
#carDetailsModal .jobsrch_box {
    padding: 0;
    background: transparent;
    border-radius: 0;
    border: none;
    box-shadow: none;
    margin-bottom: 0;
}
#carDetailsModal .jobsrch_box .col-lg-6 {flex: auto;max-width: 100%;}
#carDetailsModal .jobsrch_box img.vehicle_image {
    height: 250px !important;
}
#carDetailsModal .modal-dialog {
    max-width: 500px;
}
#carDetailsModal h4.distance_text {
    margin-bottom: 20px;
    text-align: left;
    font-size: 16px;
}
#carDetailsModal .jobsrch_right_box {
    margin-top: 20px;
}
#carDetailsModal ul.jobsrch_info_list li {
    margin-bottom: 20px;
}
#carDetailsModal ul.jobsrch_info_list li svg {
    width: 24px;
}

.jobserch_mob li svg {
    margin-bottom: 7px;
    width: 22px;
    height: 22px;
}

.job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
    color: #fff !important; 
        background: #52D017 !important;
}

@media (min-width: 768px) {

.jobserch_mob .jobsrch_box {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}
.jobserch_mob .jobsrch_box .row {
    margin: 0;
}
.jobserch_mob .jobsrch_box ul.jobsrch_info_list {
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    column-gap: 15px;
    position: relative;
    padding-top: 18px;
    row-gap: 0px;
}
.jobserch_mob .job_new_grid_img {
    width: 13%; margin-bottom: 15px;
}
.jobserch_mob .job_new_grid_post_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_vehi_modal {
    width: 20%;
}

.jobserch_mob li {
    display: block;
    margin-bottom: 0;
    align-items: center;
}

.jobserch_mob li span {
    display: block;
    font-weight: 400;
}
.jobserch_mob .job_new_grid_drop_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_time_from {
    width: 16%;
}
.jobserch_mob .job_new_grid_date {width: 30%;display: flex; position: absolute; top: -7px;    left: 0;}
.jobserch_mob .job_new_grid_date span {
    font-size: 12px;
    color: #000000ba;
}
.jobserch_mob .job_new_grid_img img {
    height: auto !important;
    border-radius: 5px;
}
.jobserch_mob .job_new_grid_img span {
    display: block;
    color: #9C9C9C;
    width: 100%;
    font-size: 8px;
}
.jobserch_mob .job_new_grid_lowest {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_type {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_bidding {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_miles {
    width: 48%;
    display: flex;
}

.jobserch_mob .job_new_grid_lowest span,
.jobserch_mob .job_new_grid_type span,
.jobserch_mob .job_new_grid_bidding span,
.jobserch_mob .job_new_grid_miles span{
    font-size: 14px;
    font-weight: 300;
    color: #000000b8;
}
.jobserch_mob li span.sub_color {
    display: flex;
}
.jobserch_mob .job_new_grid_date span {
    width: max-content;
}
.jobserch_mob .job_new_grid_lowest span {
    width: max-content;
}
.jobserch_mob li span.sub_color {
    color: #52d017;
}
.jobserch_mob .job_new_grid_type span {
    width: max-content;
}
.jobserch_mob .job_new_grid_bidding span {
    width: max-content;
}
.jobserch_mob .job_new_grid_miles span {
    width: max-content;
}
.jobserch_mob .job_new_grid_type .sub_color {
    color: #0356D6;
}
.jobserch_mob .job_new_grid_bidding span.sub_color {
    color: #0356D6;
}
.job_new_grid_bid_btn.pop_new_btn {
    position: absolute;
    top: 16%;
    right: 0;
}
.jobserch_mob_grid.new_job_design {
    position: relative;
}
.job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
    margin: 0;
    padding: 6px 15px;
    font-size: 12px;
    border-radius: 7px;
    white-space: nowrap;
}
.jobserch_mob .job_new_grid_vehi_modal span {
    width: 100%;
}






}




@media screen and (min-width: 1000px) and (max-width: 1199px) {

.jobserch_mob .jobsrch_box {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}
.jobserch_mob .jobsrch_box .row {
    margin: 0;
}
.jobserch_mob .jobsrch_box ul.jobsrch_info_list {
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    column-gap: 15px;
    position: relative;
    padding-top: 18px;
    row-gap: 0px;
}
.jobserch_mob .job_new_grid_img {
    width: 13%; margin-bottom: 15px;
}
.jobserch_mob .job_new_grid_post_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_vehi_modal {
    width: 20%;
}

.jobserch_mob li {
    display: block;
    margin-bottom: 0;
    align-items: center;
}

.jobserch_mob li span {
    display: block;
    font-weight: 400;
}
.jobserch_mob .job_new_grid_drop_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_time_from {
    width: 16%;
}
.jobserch_mob .job_new_grid_date {width: 30%;display: flex; position: absolute; top: -7px;    left: 0;}
.jobserch_mob .job_new_grid_date span {
    font-size: 12px;
    color: #000000ba;
}
.jobserch_mob .job_new_grid_img img {
    height: auto !important;
    border-radius: 5px;
}
.jobserch_mob .job_new_grid_img span {
    display: block;
    color: #9C9C9C;
    width: 100%;
    font-size: 8px;
}
.jobserch_mob .job_new_grid_lowest {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_type {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_bidding {
    width: 48%;
    display: flex;
}
.jobserch_mob .job_new_grid_miles {
    width: 48%;
    display: flex;
}

.jobserch_mob .job_new_grid_lowest span,
.jobserch_mob .job_new_grid_type span,
.jobserch_mob .job_new_grid_bidding span,
.jobserch_mob .job_new_grid_miles span{
    font-size: 14px;
    font-weight: 300;
    color: #000000b8;
}
.jobserch_mob li span.sub_color {
    display: flex;
}
.jobserch_mob .job_new_grid_date span {
    width: max-content;
}
.jobserch_mob .job_new_grid_lowest span {
    width: max-content;
}
.jobserch_mob li span.sub_color {
    color: #52d017;
}
.jobserch_mob .job_new_grid_type span {
    width: max-content;
}
.jobserch_mob .job_new_grid_bidding span {
    width: max-content;
}
.jobserch_mob .job_new_grid_miles span {
    width: max-content;
}
.jobserch_mob .job_new_grid_type .sub_color {
    color: #0356D6;
}
.jobserch_mob .job_new_grid_bidding span.sub_color {
    color: #0356D6;
}
.job_new_grid_bid_btn.pop_new_btn {
    position: absolute;
    top: 16%;
    right: 0;
}
.jobserch_mob_grid.new_job_design {
    position: relative;
}
.job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
    margin: 0;
    padding: 6px 15px;
    font-size: 12px;
    border-radius: 7px;
    white-space: nowrap;
}
.jobserch_mob .job_new_grid_vehi_modal span {
    width: 100%;
}






}


@media(min-width: 1366px){
.jobserch_mob .jobsrch_box {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}
.jobserch_mob .jobsrch_box .row {
    margin: 0;
}
.jobserch_mob .jobsrch_box ul.jobsrch_info_list {
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    column-gap: 20px;
    position: relative;
    padding-top: 20px;
    row-gap: 10px;
}
.jobserch_mob .job_new_grid_img {
    width: 13%;
}
.jobserch_mob .job_new_grid_post_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_vehi_modal {
    width: 20%;
}

.jobserch_mob li {
    display: block;
    margin-bottom: 0;
    align-items: center;
}

.jobserch_mob li span {
    display: block;
    font-weight: 400;
}
.jobserch_mob .job_new_grid_drop_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_time_from {
    width: 16%;
}
.jobserch_mob .job_new_grid_date {width: 19%;display: flex; position: absolute; top: -7px;    left: 0;}
.jobserch_mob .job_new_grid_date span {
    font-size: 12px;
    color: #000000ba;
}
.jobserch_mob .job_new_grid_img img {
    height: auto !important;
    border-radius: 5px;
}
.jobserch_mob .job_new_grid_img span {
    display: block;
    color: #9C9C9C;
            width: 100%;
    font-size: 11px;
}
.jobserch_mob .job_new_grid_lowest {
    width: 20%;
    display: flex;
}
.jobserch_mob .job_new_grid_type {
    width: 22%;
    display: flex;
}
.jobserch_mob .job_new_grid_bidding {
    width: 20%;
    display: flex;
}
.jobserch_mob .job_new_grid_miles {
    width: 29%;
    display: flex;
}

.jobserch_mob .job_new_grid_lowest span,
.jobserch_mob .job_new_grid_type span,
.jobserch_mob .job_new_grid_bidding span,
.jobserch_mob .job_new_grid_miles span{
    font-size: 14px;
    font-weight: 300;
    color: #000000b8;
}
.jobserch_mob li span.sub_color {
    display: flex;
}
.jobserch_mob .job_new_grid_date span {
    width: max-content;
}
.jobserch_mob .job_new_grid_lowest span {
    width: max-content;
}
.jobserch_mob li span.sub_color {
    color: #52d017;
}
.jobserch_mob .job_new_grid_type span {
    width: max-content;
}
.jobserch_mob .job_new_grid_bidding span {
    width: max-content;
}
.jobserch_mob .job_new_grid_miles span {
    width: max-content;
}
.jobserch_mob .job_new_grid_type .sub_color {
    color: #0356D6;
}
.jobserch_mob .job_new_grid_bidding span.sub_color {
    color: #0356D6;
}
.job_new_grid_bid_btn.pop_new_btn {
    position: absolute;
    top: 16%;
    right: 0;
}
.jobserch_mob_grid.new_job_design {
    position: relative;
}
.job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
    margin: 0;
    padding: 6px 15px;
    font-size: 12px;
    border-radius: 7px;
    white-space: nowrap;
}
.jobserch_mob .job_new_grid_vehi_modal span {
    width: 100%;
}


}


@media(min-width: 1600px){
.jobserch_mob .jobsrch_box {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}
.jobserch_mob .jobsrch_box .row {
    margin: 0;
}
.jobserch_mob .jobsrch_box ul.jobsrch_info_list {
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    column-gap: 20px;
    position: relative;
    padding-top: 20px;
    row-gap: 10px;
}
.jobserch_mob .job_new_grid_img {
    width: 10%;
}
.jobserch_mob .job_new_grid_post_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_vehi_modal {
    width: 20%;
}

.jobserch_mob li {
    display: block;
    margin-bottom: 0;
    align-items: center;
}

.jobserch_mob li span {
    display: block;
    font-weight: 400;
}
.jobserch_mob .job_new_grid_drop_code {
    width: 16%;
}
.jobserch_mob .job_new_grid_time_from {
    width: 16%;
}
.jobserch_mob .job_new_grid_date {width: 19%;display: flex; position: absolute; top: -7px;    left: 0;}
.jobserch_mob .job_new_grid_date span {
    font-size: 12px;
    color: #000000ba;
}
.jobserch_mob .job_new_grid_img img {
    height: auto !important;
    border-radius: 5px;
}
.jobserch_mob .job_new_grid_img span {
    display: block;
    color: #9C9C9C;
            width: 100%;
    font-size: 11px;
}
.jobserch_mob .job_new_grid_lowest {
    width: 23%;
    display: flex;
}
.jobserch_mob .job_new_grid_type {
    width: 23%;
    display: flex;
}
.jobserch_mob .job_new_grid_bidding {
    width: 24%;
    display: flex;
}
.jobserch_mob .job_new_grid_miles {
    width: 23%;
    display: flex;
}

.jobserch_mob .job_new_grid_lowest span,
.jobserch_mob .job_new_grid_type span,
.jobserch_mob .job_new_grid_bidding span,
.jobserch_mob .job_new_grid_miles span{
    font-size: 14px;
    font-weight: 300;
    color: #000000b8;
}
.jobserch_mob li span.sub_color {
    display: flex;
}
.jobserch_mob .job_new_grid_date span {
    width: max-content;
}
.jobserch_mob .job_new_grid_lowest span {
    width: max-content;
}
.jobserch_mob li span.sub_color {
    color: #52d017;
}
.jobserch_mob .job_new_grid_type span {
    width: max-content;
}
.jobserch_mob .job_new_grid_bidding span {
    width: max-content;
}
.jobserch_mob .job_new_grid_miles span {
    width: max-content;
}
.jobserch_mob .job_new_grid_type .sub_color {
    color: #0356D6;
}
.jobserch_mob .job_new_grid_bidding span.sub_color {
    color: #0356D6;
}
.job_new_grid_bid_btn.pop_new_btn {
    position: absolute;
    top: 16%;
    right: 0;
}
.jobserch_mob_grid.new_job_design {
    position: relative;
}
.job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
    margin: 0;
    padding: 6px 15px;
    font-size: 12px;
    border-radius: 7px;
    white-space: nowrap;
}
.jobserch_mob .job_new_grid_vehi_modal span {
    width: 100%;
}

}


/* end 16-09-2024 */


@media(max-width: 580px){
    .jobsrch_info_list li small {
        font-size: 14px;
        margin-left: 7px;
    }
    .jobsrch_info_list span {
        font-size: 14px;width: 47%;
    }
        .jpbsrch_inner {
        width: 53%;
    }
    .jobsrch_info_list li {
    margin-bottom: 20px;
}
.jobsrch_top_box img {
    height: 203px !important;
}
.distance_text {
    margin-bottom: 20px;
    text-align: left;
    font-size: 16px;
}
.jobsrch_right_box {
    margin-top: 30px;
}
.modal-content {
    border-radius: 10px;
}



.jobserch_mob_grid {
    display: flex;
}

.jobserch_mob .jobsrch_top_box {
    width: 100px;
}

.jobserch_mob .jobsrch_top_box img {
    height: 60px !important;
    border-radius: 5px;
    width: 87px !important;
}
.jobserch_mob ul.jobsrch_info_list {
    margin: 0 0 0 10px;
    display: flex;
    flex-wrap: wrap;
}
.jobserch_mob ul.jobsrch_info_list li {
    width: 50%;
    margin: 0;
    display: flex;
    align-items: flex-start;
    line-height: normal;
}
.jobserch_mob .row {
    margin: 0;
}

.jobserch_mob {
    width: calc(100% + 60px);
    margin-left: -30px;
}
.jobserch_mob .jobsrch_box {
    padding: 20px;
    margin-bottom: 7px;
    border-radius: 0;
}

.jobserch_mob ul.jobsrch_info_list li span {
    width: 100%;
    font-size: 15px;
    display: inline;
    line-height: normal;
}
.jobserch_mob ul.jobsrch_info_list li svg {
    margin-right: 7px;
    width: 21px;
    display: inline-block;
}
.jobserch_mob .jobsrch_top_box span {
    font-size: 10px;
    color: #9C9C9C;
}
.modal-header {
    border-bottom: 0;
    padding-bottom: 0;
}
button.btn-close {
    background: transparent;
    border: none;
    font-size: 22px;
    color: #9C9C9C;
    padding: 0;
    margin-left: auto;
}
.modal-header span {
    display: flex;
    align-items: center;
    color: #9C9C9C;
    font-size: 18px;
}
.modal-header span svg{
    margin-right: 7px;
}
.modal-body .jobsrch_box {
    padding: 0;
    margin-bottom: 0;
    box-shadow: none;
    border-radius: 0;
}

.jobsrch_form_blog .form-group.field_filled,
.jobsrch_form_blog .form-group.field_active {
    padding:22px 24px;
    box-shadow: none;
    font-size: 18px;
    color: #000;
}
.jobsrch_form_blog .form-control {
    font-size: 18px;
    color: #000000;
}
.jobsrch_form_blog .error-message {
    position: absolute;
    bottom: -24px;
    padding-left: 0;
}



.job_se_sec.slick-initialized .slick-slide {
    display: block;
    width: 380px !important;
}
.job_se_sec .slick-track {
    width: 760px !important;
}
.job_se_sec .slick-list.draggable {
    height: 203px !important;
}   

.modal-header button.btn-close {
    position: absolute;
    top: 11px;
    right: 15px;
}

.jobserch_mob .jobsrch_box {
    padding: 20px 20px 10px;
}



/* 16-08-2024 */

.new_job_design ul.jobsrch_info_list {
    margin: 0;
}

.new_job_design ul.jobsrch_info_list {
    margin: 0;
    display: block;
}

.jobserch_mob ul.jobsrch_info_list li.job_new_grid_img {
    width: 28%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_post_code {
    width: 30%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_vehi_modal {
    width: 41%;
    float: left;
    margin-bottom: 14px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_drop_code {
    width: 30%;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_time_from {
    width: 40%;
    margin-bottom: 20px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles {
    width: 59%;
    float: left;
    display: block;
    clear: both;padding-right: 10px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_type {
    width: 59%;
    float: left;
    display: block; clear: both;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_img span {
    font-size: 10px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_date {
    display: block;
    width: 59%;
    float: left;
    clear: both;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest {
    width: 41%;
    display: block;
    float: left;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding {
    width: 41%;
    display: block;
    float: left; 
}
.jobserch_mob ul.jobsrch_info_list li span {
    font-size: 15px; font-weight: 400;        
    width: 77%; line-height: 1;
}
.jobserch_mob ul.jobsrch_info_list li {
    margin-bottom: 6px;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn {
    display: block;
    width: 41%;
    float: left;
    margin: 0;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box {
    margin: 0;
    display: flex;
    align-items: center;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box a.make_offer_btn {
    margin-top: 0;
    font-size: 15px;
    width: max-content;
    padding: 7px 33px  10px;
    border-radius: 7px;
    text-transform: none;
}

.jobserch_mob ul.jobsrch_info_list li span.sub_color {
    color: #0356D6 !important;
}
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span.sub_color {
    color: #52D017 !important;
}
.jobserch_mob ul.jobsrch_info_list li span.sub_color span {
    color: #9C9C9C;
}
small.new_tag {
    position: absolute;
    background: #52d017;
    color: #fff;
    right: -48px;
    padding: 3px 32px;
    font-size: 13px;
    transform: rotate(50deg);
    top: -11px;
}
small.expring_tag {
    position: absolute;
    background: #ED1C24;
    color: #fff;
    right: -56px;
    padding: 3px 32px;
    font-size: 12px;
    transform: rotate(50deg);
    top: -11px;
}
.jobsrch_box {
    position: relative;
    overflow: hidden;
}

.jobserch_mob ul.jobsrch_info_list li.job_new_grid_type span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_date span,
.jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles span {
    color: #000000ba;
    font-size: 12px; font-weight: 300;
}
.jobserch_mob_grid.new_job_design ul.jobsrch_info_list {
    width: 100%;
}

.jobserch_mob_grid {
    display: flex;
    flex-wrap: wrap;
    position: relative;
    padding-bottom: 11px;
}
.pop_new_btn .jobsrch_right_box {
    position: absolute;
    right: 7%;
    bottom: 0;
    margin: 0;
}
.pop_new_btn .jobsrch_right_box a.make_offer_btn {
    font-size: 15px;
    padding: 7px 33px 10px;
    border-radius: 7px;
}

.jpbsrch_inner svg {
    width: 24px;
}


.job-data span {
    color: #9C9C9C;
    font-size: 15px;
}
.job-data {
    margin-left: -10px;
    margin-bottom: 8px;
}
.content_container {
    padding-bottom: 0;
}

}
@media(max-width: 400px){
.jobsrch_box {
    padding: 10px;
    margin-bottom: 24px;
}
.pop_new_btn .jobsrch_right_box {
    right: 5%;
}
}


    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/rangeslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
@endsection

@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
        @include('layouts.transporter.dashboard.top_head')
        <!-- content part -->
            <div class="content_container">
            <div class="banner" id="spam-banner" style="display:none">
                <h2 class="spam-title">Check your spam.</h2>
                <p>Please check your spam or junk folder and mark email as ‘not spam’ so that you don’t miss out on any important email notifications. You can unsubscribe from job alert emails at any time within your profile.</p>
                <button onclick="hideBanner()" class="btn btn-success">Ok, got it</button>
            </div>
                <div class="job_container">
                    <div class="admin_job_bx find_trans_newjob" id="style-1">
                        <div class="admin_job_top">
                            <h3>Find transport jobs</h3>
                        </div>
                        <div class="container">
                            <div id="popup">
                                <p>Searching for transport jobs that match your criteria...</p>
                                <img src="/uploads/loading-popup.gif" alt="Loading">
                            </div>
                            <p class="pera_srch">Search for jobs and make an offer.</p>
                            <form id="jobsrch_form_blog" class="jobsrch_form_blog">
                                <div class="form-group where_custom">
                                    <label id="pickupLabel">Where from?</label>
                                    <input type="text" class="form-control" name="search_pick_up_area" id="search_pick_up_area" placeholder="Search collection area " />
                                    <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
                                    <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
                                    <svg class="svgvector_mob d-md-none d-block" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="suggest_filter where_box" style="display: none;">
                                    <label>London</label>
                                    <label>Manchester</label>
                                    <label>Newcastle</label>
                                    <label>Birmingham</label>
                                    <label>Liverpool</label>
                                    <label>Essex</label>
                                    <label>Leeds</label>
                                    <label>Wales</label>
                                    <label>Sheffield</label>
                                    <label>Devon</label>
                                </div>
                                <div class="form-group drop_off_box">
                                    <label id="dropoffLabel">Where to?</label>
                                    <input type="text" class="form-control" name="search_drop_off_area" id="search_drop_off_area" placeholder="Anywhere"/>
                                    <input type="hidden" name="drop_off_latitude" id="drop_off_latitude">
                                    <input type="hidden" name="drop_off_longitude" id="drop_off_longitude">
                                    <svg class="svgvector_mob d-md-none d-block" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="suggest_filter to_box" style="display: none;">
                                    <label>Anywhere</label>
                                    <label>London</label>
                                    <label>Manchester</label>
                                    <label>Newcastle</label>
                                    <label>Birmingham</label>
                                    <label>Liverpool</label>
                                    <label>Essex</label>
                                    <label>Leeds</label>
                                    <label>Wales</label>
                                    <label>Sheffield</label>
                                    <label>Devon</label>
                                </div>
                                <div class="form-group">
                                    <a href="javascript:;" class="srchjob_byn" id="search_job">
                                        <svg class="d-md-inline-block d-none" xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.21851 7.6448C1.21806 4.71363 3.28826 2.19034 6.16303 1.6181C9.0378 1.04585 11.9165 2.58403 13.0385 5.29194C14.1606 7.99984 13.2135 11.1233 10.7765 12.752C8.33955 14.3808 5.09138 14.0612 3.01851 11.9888C1.86613 10.8368 1.21864 9.27422 1.21851 7.6448Z" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.7075 11.9897L15.2185 15.5007" stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg><span class="d-md-inline-block d-none">Search</span> <span class="d-md-none d-inline-block">Search jobs</span>
                                    </a>
                                </div>
                            </form>

                            <div class="job-data">
                            @if ($quotes->total() == 0)
                                <span>Results: 0</span>
                            @else
                                @if ($quotes->total() > 50)
                                    <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
                                @else
                                    @if ($quotes->firstItem() == $quotes->lastItem())
                                        <span>Results: {{ $quotes->firstItem() }} of {{ $quotes->total() }}</span>
                                    @else
                                        <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
                                    @endif
                                @endif
                            @endif
                            </div>
                            <!-- for mobile view -->
                            <div class="jobsrch_blogs jobserch_mob">
                                @foreach($quotes as $quote)
                                    <div class="jobsrch_box">
                                        <div class="row">
                                            <div class="jobserch_mob_grid new_job_design"> 
                                                @if($quote->created_at->timezone('Europe/London')->diffInHours(now('Europe/London')) < 1)
                                                    <small class="new_tag">New</small>
                                                @endif
                                                @php
                                                    $nowInLondon = now('Europe/London');
                                                    $createdAtInLondon = $quote->created_at->timezone('Europe/London');
                                                @endphp
                                                @if($createdAtInLondon->diffInDays($nowInLondon) >= 8 && $createdAtInLondon->diffInDays($nowInLondon) <= 10)
                                                    <small class="expring_tag">Expiring</small>
                                                @endif                                         
                                                <ul class="jobsrch_info_list car-row" data-car-id="{{$quote->id}}">
                                                    <li class="job_new_grid_img">
                                                        <div class="jobsrch_top_box position-relative">
                                                            <img src="{{$quote->image}}" class="vehicle_image" alt="image" />
                                                            <span>Posted {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="job_new_grid_post_code">
                                                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#52D017" />
                                                        </svg>
                                                        <span>{{$quote->pickup_postcode ? extractPostcode($quote->pickup_postcode) : '-'}}</span>
                                                    </li>
                                                    <li class="job_new_grid_vehi_modal">
                                                        <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.94078 4.92816C4.88066 2.60353 6.0112 1 8.57049 1H15.4307C17.9876 1 19.1193 2.60353 20.0604 4.92816L21.0003 7.41535C21.7006 7.42378 22.344 7.80289 22.6906 8.41145C22.8946 8.75808 23.0014 9.15325 22.9998 9.55543V12.7625C23.0089 13.5113 22.631 14.2118 22.0001 14.6154C21.7001 14.8022 21.3537 14.9013 21.0003 14.9014H2.99969C2.64626 14.9013 2.29992 14.8022 1.99992 14.6154C1.36905 14.2118 0.991065 13.5113 1.00016 12.7625V9.55543C0.998842 9.15367 1.10565 8.75895 1.30938 8.41267C1.65604 7.80412 2.29937 7.425 2.99969 7.41657L3.94078 4.92816Z" stroke="#008DD4" stroke-width="1.46665" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.73371 14.9025C5.73371 14.4975 5.40539 14.1692 5.00039 14.1692C4.59539 14.1692 4.26707 14.4975 4.26707 14.9025H5.73371ZM5.00039 16.5073H4.26707C4.26707 16.5151 4.26719 16.5229 4.26744 16.5307L5.00039 16.5073ZM3.49952 18.1108L3.47398 18.8437C3.49082 18.8442 3.50767 18.8443 3.52451 18.8437L3.49952 18.1108ZM1.99988 16.506L2.73281 16.5301C2.73307 16.5221 2.7332 16.5141 2.7332 16.506H1.99988ZM2.7332 14.6153C2.7332 14.2103 2.40488 13.882 1.99988 13.882C1.59488 13.882 1.26656 14.2103 1.26656 14.6153H2.7332ZM2.99964 6.68196C2.59463 6.68196 2.26631 7.01028 2.26631 7.41528C2.26631 7.82029 2.59463 8.14861 2.99964 8.14861V6.68196ZM21.0003 8.14861C21.4053 8.14861 21.7336 7.82029 21.7336 7.41528C21.7336 7.01028 21.4053 6.68196 21.0003 6.68196V8.14861ZM19.7341 14.9013C19.7341 14.4963 19.4058 14.168 19.0008 14.168C18.5958 14.168 18.2674 14.4963 18.2674 14.9013H19.7341ZM19.0008 16.506L19.7326 16.5528C19.7336 16.5372 19.7341 16.5216 19.7341 16.506H19.0008ZM19.7219 17.8875L20.1019 17.2603L19.7219 17.8875ZM21.2802 17.8875L20.9001 17.2603L21.2802 17.8875ZM22.0013 16.506H21.2679C21.2679 16.5216 21.2684 16.5372 21.2694 16.5528L22.0013 16.506ZM22.7346 14.6153C22.7346 14.2103 22.4063 13.882 22.0013 13.882C21.5963 13.882 21.2679 14.2103 21.2679 14.6153H22.7346ZM4.66674 10.6553C4.26174 10.6553 3.93342 10.9836 3.93342 11.3886C3.93342 11.7936 4.26174 12.122 4.66674 12.122V10.6553ZM5.88894 12.122C6.29395 12.122 6.62227 11.7936 6.62227 11.3886C6.62227 10.9836 6.29395 10.6553 5.88894 10.6553V12.122ZM18.111 10.6553C17.706 10.6553 17.3777 10.9836 17.3777 11.3886C17.3777 11.7936 17.706 12.122 18.111 12.122V10.6553ZM19.3332 12.122C19.7382 12.122 20.0665 11.7936 20.0665 11.3886C20.0665 10.9836 19.7382 10.6553 19.3332 10.6553V12.122ZM4.26707 14.9025V16.5073H5.73371V14.9025H4.26707ZM4.26744 16.5307C4.28195 16.9834 3.92721 17.3625 3.47453 17.3779L3.52451 18.8437C4.78556 18.8007 5.77375 17.7449 5.73334 16.4838L4.26744 16.5307ZM3.52507 17.3779C3.07238 17.3621 2.71793 16.9828 2.73281 16.5301L1.26695 16.4819C1.22551 17.7431 2.21292 18.7997 3.47398 18.8437L3.52507 17.3779ZM2.7332 16.506V14.6153H1.26656V16.506H2.7332ZM2.99964 8.14861H21.0003V6.68196H2.99964V8.14861ZM18.2674 14.9013V16.506H19.7341V14.9013H18.2674ZM18.2689 16.4593C18.2158 17.2907 18.6293 18.0828 19.3418 18.5146L20.1019 17.2603C19.8566 17.1117 19.7143 16.839 19.7326 16.5528L18.2689 16.4593ZM19.3418 18.5146C20.0543 18.9464 20.9477 18.9464 21.6602 18.5146L20.9001 17.2603C20.6548 17.409 20.3472 17.409 20.1019 17.2603L19.3418 18.5146ZM21.6602 18.5146C22.3728 18.0828 22.7862 17.2907 22.7331 16.4593L21.2694 16.5528C21.2877 16.839 21.1454 17.1117 20.9001 17.2603L21.6602 18.5146ZM22.7346 16.506V14.6153H21.2679V16.506H22.7346ZM4.66674 12.122H5.88894V10.6553H4.66674V12.122ZM18.111 12.122H19.3332V10.6553H18.111V12.122Z" fill="#008DD4" />
                                                        </svg>
                                                        @if(!is_null($quote->vehicle_make_1) && !is_null($quote->vehicle_model_1))
                                                            <span>2x Vehicles</span>
                                                        @else
                                                            <span>{{$quote->vehicle_make}} {{$quote->vehicle_model}}</span>
                                                        @endif
                                                    </li>
                                                    <li class="job_new_grid_drop_code">
                                                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#ED1C24"/>
                                                        </svg>
                                                        <span>{{$quote->drop_postcode ? extractPostcode($quote->drop_postcode) : '-'}}</span>
                                                    </li>
                                                    <li class="job_new_grid_time_from">
                                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33929ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929V2.51786ZM5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929V2.51786ZM13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786V4.33929ZM6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857H6.76786ZM4.94643 4.64286C4.94643 5.14583 5.35417 5.55357 5.85714 5.55357C6.36012 5.55357 6.76786 5.14583 6.76786 4.64286H4.94643ZM4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857H4.94643ZM6.76786 1C6.76786 0.497026 6.36012 0.0892857 5.85714 0.0892857C5.35417 0.0892857 4.94643 0.497026 4.94643 1L6.76786 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1L14.0536 1ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33929 5.85714 4.33929V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33929C15.3224 4.33929 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85714 4.33929L13.1429 4.33929V2.51786L5.85714 2.51786V4.33929ZM4.94643 3.42857V4.64286H6.76786V3.42857H4.94643ZM6.76786 3.42857V1L4.94643 1V3.42857H6.76786ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1L12.2321 1V3.42857H14.0536Z" fill="#008DD4" />
                                                            <path d="M4.64282 11.9286L7.07139 15.5714L14.3571 9.5" stroke="#008DD4" stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span>
                                                            @if($quote->delivery_timeframe_from)
                                                                <span>{{ formatCustomDate($quote->delivery_timeframe_from) }}</span>
                                                            @else
                                                                <span>{{$quote->delivery_timeframe}}</span>
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li class="job_new_grid_date">
                                                        <span>Expiry date:</span>
                                                        <span>
                                                        {{ formatCustomDate($quote->created_at->addDays(10)) }}
                                                        </span>
                                                    </li>
                                                    @php
                                                        $lowestBid = $quote->lowest_bid ?? 0;
                                                        $transporterQuotesCount = $quote->transporter_quotes_count ?? 0;
                                                    @endphp

                                                    @if($transporterQuotesCount > 0)
                                                        <li class="job_new_grid_lowest">
                                                            <span>Current lowest bid:</span>
                                                            <span class="sub_color">£{{ $lowestBid }}</span>
                                                        </li>
                                                    @else
                                                    <li class="job_new_grid_lowest">
                                                        <span>Current lowest bid:</span>
                                                        <span class="sub_color">£0</span>
                                                    </li>
                                                    @endif
                                                    <li class="job_new_grid_type">
                                                        <span>Delivery type:</span>
                                                        <span class="sub_color">
                                                        {{ $quote->how_moved }}
                                                        </span>
                                                    </li>
                                                    @if($transporterQuotesCount > 0)
                                                    <li class="job_new_grid_bidding">
                                                        <span>Transporters bidding:</span>
                                                        <span class="sub_color">{{ $transporterQuotesCount }}</span>
                                                    </li>
                                                    @else
                                                    <li class="job_new_grid_bidding">
                                                        <span>Transporters bidding:</span>
                                                        <span class="sub_color">0</span>
                                                    </li>
                                                    @endif
                                                    <li class="job_new_grid_miles">
                                                        <span>Journey miles:</span>  
                                                        <span class="sub_color">{{ str_replace(' mi', '', $quote->distance) }} <span>({{$quote->duration}})</span></span>    
                                                    </li>
                                                </ul>
                                                <div class="job_new_grid_bid_btn pop_new_btn">
                                                        <div class="jobsrch_right_box">
                                                        <!-- <img src="{{$quote->map_image}}" alt="image" class="mapimg_jobsrch" /> -->
                                                        <a href="javascript:;" onclick="share_give_quote('{{$quote->id}}');" class="make_offer_btn checkStatus">Place bid</a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="idLoadData">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination before_search">
        {{ $quotes->links() }}
    </div>

    <div class="modal get_quote fade" id="quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Place your bid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z" fill="#000"/>
                        </svg>
                    </span>
                    </button>
                </div>
                <form id="main_form" method="post" action="{{route('transporter.submit_offer')}}" class="bid_form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="icon_includes">£</span>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter your bid" id="amount" name="amount">
                            <!-- <p style="font-size:12px; margin-top: 10px;"><b> Note:</b> The amount you bid will be the total amount you get paid directly by the customer.</p> -->
                            <div class="modal_current">
                                <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                                <p>Transporters bidding: <span class="red bidCount">0</span></p>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <textarea placeholder="Send a professional message for a better chance of winning the job..." class="form-control textarea" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: 10px;">
                        <input type="hidden" name="quote_id" id="quote_id" value="">
                        <p><b> Note:</b>  Do not share any contact information or company names, we will provide you with the customers details after they have accepted your quote.</p>
                        <button type="submit" class="submit_btn">Place bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <span id="backButton">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                            Back
                    </span>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.292893 15.2929C-0.0976311 15.6834 -0.0976311 16.3166 0.292893 16.7071C0.683417 17.0976 1.31658 17.0976 1.70711 16.7071L0.292893 15.2929ZM9.20711 9.20711C9.59763 8.81658 9.59763 8.18342 9.20711 7.79289C8.81658 7.40237 8.18342 7.40237 7.79289 7.79289L9.20711 9.20711ZM7.79289 7.79289C7.40237 8.18342 7.40237 8.81658 7.79289 9.20711C8.18342 9.59763 8.81658 9.59763 9.20711 9.20711L7.79289 7.79289ZM16.7071 1.70711C17.0976 1.31658 17.0976 0.683417 16.7071 0.292893C16.3166 -0.0976311 15.6834 -0.0976311 15.2929 0.292893L16.7071 1.70711ZM9.20711 7.79289C8.81658 7.40237 8.18342 7.40237 7.79289 7.79289C7.40237 8.18342 7.40237 8.81658 7.79289 9.20711L9.20711 7.79289ZM15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.2929 16.7071ZM7.79289 9.20711C8.18342 9.59763 8.81658 9.59763 9.20711 9.20711C9.59763 8.81658 9.59763 8.18342 9.20711 7.79289L7.79289 9.20711ZM1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM1.70711 16.7071L9.20711 9.20711L7.79289 7.79289L0.292893 15.2929L1.70711 16.7071ZM9.20711 9.20711L16.7071 1.70711L15.2929 0.292893L7.79289 7.79289L9.20711 9.20711ZM7.79289 9.20711L15.2929 16.7071L16.7071 15.2929L9.20711 7.79289L7.79289 9.20711ZM9.20711 7.79289L1.70711 0.292893L0.292893 1.70711L7.79289 9.20711L9.20711 7.79289Z" fill="#9C9C9C"/>
                        </svg>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body" id="carDetailsModalBody">
                    <!-- Modal content will be dynamically updated here -->
                </div>
                <!-- Modal Footer
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Place bid</button>
                </div> -->
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('assets/web/js/admin.js')}}"></script>
    <script src="{{asset('assets/web/js/main.js')}}"></script>
    <script src="{{asset('assets/web/js/rangeslider.js')}}"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ config('constants.google_map_key') }}&libraries=places" ></script>
    {{--    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.google_map_key') }}&loading=async&libraries=places&callback=initMap" async defer></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'
        var carDetails = @json($quotes);
        var isMobile = '{{ isMobile() }}';
        $.validator.addMethod("noPhoneOrEmail", function(value, element) {
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(value);
            var contains_six_or_more_digits = value.replace(/\s+/g, '').match(/\d{7,}/);
            return !(contains_email || contains_six_or_more_digits);
        });
        $.validator.addMethod("greaterThanZero", function(value, element) {
            return this.optional(element) || parseFloat(value) > 0;
        }, "You must enter an amount greater than zero");
        $("#main_form").validate({
            rules: {
                amount: {
                    required: true,
                    noPhoneOrEmail: true,
                    greaterThanZero: true
                },
                message: {
                    required: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail:  `Do not share contact information or you will be banned.`,
                    greaterThanZero: 'You must enter an amount greater than zero'
                },
                message: {
                    required: 'Please enter message',
                    noPhoneOrEmail:  `Do not share contact information or you will be banned.`
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function (form) {
                var submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if(response.success) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid placed</span>',
                                html: '<span class="swal-text">Your bid has been placed successfully.</span>',
                                confirmButtonColor: '#52D017',
                                confirmButtonText: 'Dismiss',
                                customClass: {
                                    title: 'swal-title',
                                    htmlContainer: 'swal-text-container',
                                    popup: 'swal-popup', // Add custom class for the popup
                                    cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                                },
                                showCloseButton: true, // Add this line to show the close button
                                showConfirmButton: true, // Add this line to hide the confirm button
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            submitButton.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                            var errors = jqXHR.responseJSON.errors;
                            $('#main_form').find('span.error').remove();
                            $.each(errors, function(key, errorMessages) {
                                alert(key)
                                var element = $('#' + key);
                                if (element.length > 0) {
                                    var errorElement = element.next('span.error');
                                    if (errorElement.length === 0) {
                                        errorElement = $('<span id='+key+'-error class="error"></span>');
                                        element.after(errorElement);
                                    }

                                    errorElement.text(errorMessages[0]);
                                }
                            });
                        } else {
                            console.error('Unexpected error:', textStatus, errorThrown);
                        }
                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
            }
        });

        function share_give_quote(id) {
            $('#quote_id').val(id);
            var quotes = @json($quotes);
            var selectedQuote = quotes.data.find(quote => quote.id == id);
            if (selectedQuote) {
                var lowestBid = selectedQuote.lowest_bid ? selectedQuote.lowest_bid : 0;
                var bidCount = selectedQuote.transporter_quotes_count ? selectedQuote.transporter_quotes_count : 0;

                $('.lowAmount').text('£'+lowestBid);
                $('.bidCount').text(bidCount);
                // Prevent closing quote modal when clicking outside
                $('#quote').modal({ backdrop: 'static', keyboard: false });
                // if(isMobile) {
                    $('#quote').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 10);
                    $('.modal-backdrop').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 5);
                // }
                $('#quote').modal('show');
            }
        }
        function myFunction(x) {
            if (x.matches) { // If media query matches
                $(document).ready(function() {
                    $('.where_custom').click(function() {
                        $('.where_box').slideToggle("slow");
                        $('#pickupLabel').hide();
                        $('#search_pick_up_area').attr('placeholder', 'Where from ?');
                    });
                    $('.drop_off_box').click(function() {
                        $('.to_box').slideToggle("slow");
                        $('#dropoffLabel').hide();
                        $('#search_drop_off_area').attr('placeholder', 'Where to ?');
                    });
                });
            } else {
                $(document).ready(function() {
                    $('.where_custom').click(function() {
                        $('.where_box').hide();
                    });
                });

                $(document).ready(function() {
                    $('.drop_off_box').click(function() {
                        $('.to_box').hide();
                    });
                });
            }
        }

        // Listen for the quote modal to be hidden
        $('#quote').on('hidden.bs.modal', function (e) {
            // Clear the z-index
            $('#quote').css('z-index', '');
            $('.modal-backdrop').remove(); // Ensure the backdrop is removed

            // Remove the modal-open class and re-enable scrolling
            $('body').removeClass('modal-open');
            $('body').css('overflow', 'auto'); // Re-enable scrolling if it was disabled
        });
        // Create a MediaQueryList object
        var x = window.matchMedia("(max-width: 767px)")

        // Call listener function at run time
        myFunction(x);

        // Attach listener function on state changes
        x.addEventListener("change", function() {
            myFunction(x);
        });


        $(document).ready(function() {
            $("#jobsrch_form_blog").validate({
                rules: {
                    search_pick_up_area: {
                        required: true
                    },
                    search_drop_off_area: {
                        required: false
                    }
                },
                messages: {
                    search_pick_up_area: {
                        required: "Please enter collection area"
                    },
                    search_drop_off_area: {
                        required: "Please enter delivery area"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('error-message'); // Add custom class for styling
                    error.insertAfter(element);
                    element.closest('.form-group').addClass('error-margin');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('error-margin');
                }
            });
            $(document).on('click', '.car-row', function() {
                var carId = $(this).data('car-id');
                var carData = carDetails.data.find(function(car) {
                    return car.id == carId;
                });
                if (carData) {
                    let makeAndModel = `${carData.vehicle_make} ${carData.vehicle_model}`;
                    if (carData.vehicle_make_1 && carData.vehicle_model_1) {
                        makeAndModel += ` / ${carData.vehicle_make_1} ${carData.vehicle_model_1}`;
                    }
                    let startsDrives = carData.starts_drives == 0 ? 'No' : 'Yes';
                    if (carData.starts_drives_1 !== null) {
                        startsDrives += ` / ${carData.starts_drives_1 == 0 ? 'No' : 'Yes'}`;
                    }
                    // Dynamically update modal body content
                    var modalBodyContent = `
                    <div class="jobsrch_box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="jobsrch_top_box position-relative">
                                    ${carData.vehicle_make_1 == null && carData.vehicle_model_1 == null ? `
                                    <div>
                                        <img src="${carData.image}" class="vehicle_image" alt="Vehicle Image" />
                                    </div>
                                    ` : `
                                    <div class="job_se_sec slider">
                                        <div>
                                            <img src="${carData.image}" class="vehicle_image" alt="Vehicle Image" />
                                        </div>
                                        ${carData.image_1 ? `
                                            <div>
                                                <img src="/${carData.image_1}" class="vehicle_image" alt="Vehicle Image" />
                                            </div>
                                        ` : `
                                            <div>
                                                <img src="/uploads/no_car_image.png" class="vehicle_image" alt="No Image Available" />
                                            </div>
                                        `}
                                    </div>
                                    <div class="custom-navigation">
                                        <span class="current-slide">1</span> of <span class="total-slides">2</span>
                                    </div>
                                    `}
                                    <div class="jobsrch_head">
                                        ${carData.user && carData.user.profile_image ? `<img src="${carData.user.profile_image}" class="userimg" alt="User Image" />` : ''}
                                    </div>
                                </div>
                                <ul class="jobsrch_info_list">
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.94078 4.92816C4.88066 2.60353 6.0112 1 8.57049 1H15.4307C17.9876 1 19.1193 2.60353 20.0604 4.92816L21.0003 7.41535C21.7006 7.42378 22.344 7.80289 22.6906 8.41145C22.8946 8.75808 23.0014 9.15325 22.9998 9.55543V12.7625C23.0089 13.5113 22.631 14.2118 22.0001 14.6154C21.7001 14.8022 21.3537 14.9013 21.0003 14.9014H2.99969C2.64626 14.9013 2.29992 14.8022 1.99992 14.6154C1.36905 14.2118 0.991065 13.5113 1.00016 12.7625V9.55543C0.998842 9.15367 1.10565 8.75895 1.30938 8.41267C1.65604 7.80412 2.29937 7.425 2.99969 7.41657L3.94078 4.92816Z" stroke="#008DD4" stroke-width="1.46665" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.73371 14.9025C5.73371 14.4975 5.40539 14.1692 5.00039 14.1692C4.59539 14.1692 4.26707 14.4975 4.26707 14.9025H5.73371ZM5.00039 16.5073H4.26707C4.26707 16.5151 4.26719 16.5229 4.26744 16.5307L5.00039 16.5073ZM3.49952 18.1108L3.47398 18.8437C3.49082 18.8442 3.50767 18.8443 3.52451 18.8437L3.49952 18.1108ZM1.99988 16.506L2.73281 16.5301C2.73307 16.5221 2.7332 16.5141 2.7332 16.506H1.99988ZM2.7332 14.6153C2.7332 14.2103 2.40488 13.882 1.99988 13.882C1.59488 13.882 1.26656 14.2103 1.26656 14.6153H2.7332ZM2.99964 6.68196C2.59463 6.68196 2.26631 7.01028 2.26631 7.41528C2.26631 7.82029 2.59463 8.14861 2.99964 8.14861V6.68196ZM21.0003 8.14861C21.4053 8.14861 21.7336 7.82029 21.7336 7.41528C21.7336 7.01028 21.4053 6.68196 21.0003 6.68196V8.14861ZM19.7341 14.9013C19.7341 14.4963 19.4058 14.168 19.0008 14.168C18.5958 14.168 18.2674 14.4963 18.2674 14.9013H19.7341ZM19.0008 16.506L19.7326 16.5528C19.7336 16.5372 19.7341 16.5216 19.7341 16.506H19.0008ZM19.7219 17.8875L20.1019 17.2603L19.7219 17.8875ZM21.2802 17.8875L20.9001 17.2603L21.2802 17.8875ZM22.0013 16.506H21.2679C21.2679 16.5216 21.2684 16.5372 21.2694 16.5528L22.0013 16.506ZM22.7346 14.6153C22.7346 14.2103 22.4063 13.882 22.0013 13.882C21.5963 13.882 21.2679 14.2103 21.2679 14.6153H22.7346ZM4.66674 10.6553C4.26174 10.6553 3.93342 10.9836 3.93342 11.3886C3.93342 11.7936 4.26174 12.122 4.66674 12.122V10.6553ZM5.88894 12.122C6.29395 12.122 6.62227 11.7936 6.62227 11.3886C6.62227 10.9836 6.29395 10.6553 5.88894 10.6553V12.122ZM18.111 10.6553C17.706 10.6553 17.3777 10.9836 17.3777 11.3886C17.3777 11.7936 17.706 12.122 18.111 12.122V10.6553ZM19.3332 12.122C19.7382 12.122 20.0665 11.7936 20.0665 11.3886C20.0665 10.9836 19.7382 10.6553 19.3332 10.6553V12.122ZM4.26707 14.9025V16.5073H5.73371V14.9025H4.26707ZM4.26744 16.5307C4.28195 16.9834 3.92721 17.3625 3.47453 17.3779L3.52451 18.8437C4.78556 18.8007 5.77375 17.7449 5.73334 16.4838L4.26744 16.5307ZM3.52507 17.3779C3.07238 17.3621 2.71793 16.9828 2.73281 16.5301L1.26695 16.4819C1.22551 17.7431 2.21292 18.7997 3.47398 18.8437L3.52507 17.3779ZM2.7332 16.506V14.6153H1.26656V16.506H2.7332ZM2.99964 8.14861H21.0003V6.68196H2.99964V8.14861ZM18.2674 14.9013V16.506H19.7341V14.9013H18.2674ZM18.2689 16.4593C18.2158 17.2907 18.6293 18.0828 19.3418 18.5146L20.1019 17.2603C19.8566 17.1117 19.7143 16.839 19.7326 16.5528L18.2689 16.4593ZM19.3418 18.5146C20.0543 18.9464 20.9477 18.9464 21.6602 18.5146L20.9001 17.2603C20.6548 17.409 20.3472 17.409 20.1019 17.2603L19.3418 18.5146ZM21.6602 18.5146C22.3728 18.0828 22.7862 17.2907 22.7331 16.4593L21.2694 16.5528C21.2877 16.839 21.1454 17.1117 20.9001 17.2603L21.6602 18.5146ZM22.7346 16.506V14.6153H21.2679V16.506H22.7346ZM4.66674 12.122H5.88894V10.6553H4.66674V12.122ZM18.111 12.122H19.3332V10.6553H18.111V12.122Z" fill="#008DD4" />
                                            </svg>
                                            <small>Make & Model:</small>
                                        </div>
                                        <span>${makeAndModel}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#52D017" />
                                            </svg>
                                            <small>Pick-up area:</small>
                                        </div>
                                        <span>${carData.pickup_postcode ? formatAddress(carData.pickup_postcode) : '-'}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#ED1C24"/></svg>
                                            <small>Drop-off area:</small>
                                        </div>
                                        <span>${carData.drop_postcode ? formatAddress(carData.drop_postcode) : '-'}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33929ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929V2.51786ZM5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929V2.51786ZM13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786V4.33929ZM6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857H6.76786ZM4.94643 4.64286C4.94643 5.14583 5.35417 5.55357 5.85714 5.55357C6.36012 5.55357 6.76786 5.14583 6.76786 4.64286H4.94643ZM4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857H4.94643ZM6.76786 1C6.76786 0.497026 6.36012 0.0892857 5.85714 0.0892857C5.35417 0.0892857 4.94643 0.497026 4.94643 1L6.76786 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1L14.0536 1ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33929 5.85714 4.33929V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33929C15.3224 4.33929 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85714 4.33929L13.1429 4.33929V2.51786L5.85714 2.51786V4.33929ZM4.94643 3.42857V4.64286H6.76786V3.42857H4.94643ZM6.76786 3.42857V1L4.94643 1V3.42857H6.76786ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1L12.2321 1V3.42857H14.0536Z" fill="#008DD4" />
                                                <path d="M4.64282 11.9286L7.07139 15.5714L14.3571 9.5" stroke="#008DD4" stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <small>Delivery date:</small>
                                        </div>
                                        <span>${carData.delivery_timeframe_from ? formatCustomDate(carData.delivery_timeframe_from) : carData.delivery_timeframe}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0004 9.50038C18.0004 14.1947 14.1946 18.0001 9.5 18.0001C9.5 13.9761 10.7143 8.89326 16.7861 8.28613H17.9142C17.9717 8.68833 18.0005 9.0941 18.0004 9.50038V9.50038Z" stroke="#008DD4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2.30308 7.39048C1.80849 7.34102 1.36745 7.70187 1.318 8.19646C1.26854 8.69105 1.6294 9.13209 2.12399 9.18155L2.30308 7.39048ZM9.49959 18L9.49949 18.9C9.7382 18.9 9.96715 18.8052 10.136 18.6364C10.3048 18.4676 10.3996 18.2387 10.3996 18H9.49959ZM1.00983 9.9056L0.110853 9.94852L1.00983 9.9056ZM8.68978 1.03927L8.60394 0.143375L8.68978 1.03927ZM17.023 8.41459C17.094 8.90655 17.5504 9.24779 18.0424 9.17678C18.5343 9.10577 18.8756 8.64939 18.8046 8.15743L17.023 8.41459ZM2.21393 9.18608C2.71098 9.18608 3.11393 8.78314 3.11393 8.28608C3.11393 7.78903 2.71098 7.38608 2.21393 7.38608V9.18608ZM1.0858 7.38608C0.588745 7.38608 0.185801 7.78903 0.185801 8.28608C0.185801 8.78314 0.588745 9.18608 1.0858 9.18608V7.38608ZM2.21434 7.38608C1.71729 7.38608 1.31434 7.78903 1.31434 8.28608C1.31434 8.78314 1.71729 9.18608 2.21434 9.18608V7.38608ZM16.7865 9.18608C17.2835 9.18608 17.6865 8.78314 17.6865 8.28608C17.6865 7.78903 17.2835 7.38608 16.7865 7.38608V9.18608ZM2.12399 9.18155C4.87252 9.45638 6.43598 10.7136 7.35307 12.31C8.30203 13.9619 8.5996 16.0551 8.5996 18H10.3996C10.3996 15.9209 10.09 13.4607 8.91385 11.4134C7.70584 9.31054 5.62626 7.72277 2.30308 7.39048L2.12399 9.18155ZM9.4997 17.1C5.44329 17.0995 2.10224 13.914 1.9088 9.86268L0.110853 9.94852C0.350111 14.9595 4.48255 18.8994 9.49949 18.9L9.4997 17.1ZM1.9088 9.86268C1.71537 5.81137 4.73771 2.32205 8.77561 1.93517L8.60394 0.143375C3.60987 0.621863 -0.128406 4.93752 0.110853 9.94852L1.9088 9.86268ZM8.77561 1.93517C12.8135 1.54829 16.4436 4.40026 17.023 8.41459L18.8046 8.15743C18.0878 3.19218 13.598 -0.335113 8.60394 0.143375L8.77561 1.93517ZM2.21393 7.38608H1.0858V9.18608H2.21393V7.38608ZM2.21434 9.18608H16.7865V7.38608H2.21434V9.18608Z" fill="#008DD4"/>
                                            </svg>
                                            <small>Starts & drives:</small>
                                        </div>
                                        <span>${startsDrives}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 7.85714V10.1429C1 13.93 4.07005 17 7.85714 17H10.1429C13.93 17 17 13.93 17 10.1429V7.85714C17 4.07005 13.93 1 10.1429 1H7.85714C4.07005 1 1 4.07005 1 7.85714Z" stroke="#008DD4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.00112 9V13.5714" stroke="#008DD4" stroke-width="1.8" stroke-linecap="round"/>
                                                <path d="M9.00112 6.14286C8.68603 6.14286 8.42969 5.88651 8.42969 5.57143C8.42969 5.25634 8.68603 5 9.00112 5C9.3162 5 9.57254 5.25634 9.57254 5.57143C9.57254 5.88651 9.3162 6.14286 9.00112 6.14286Z" fill="#008DD4"/>
                                                <path d="M9.00223 4.42871C9.63341 4.42871 10.1451 4.94039 10.1451 5.57157C10.1451 6.20275 9.63341 6.71443 9.00223 6.71443C8.37106 6.71443 7.85938 6.20275 7.85938 5.57157C7.85938 4.94039 8.37106 4.42871 9.00223 4.42871Z" fill="#008DD4"/>
                                            </svg>
                                            <small>Delivery preference:</small>
                                        </div>
                                        <span>${carData.how_moved}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="jobsrch_right_box">
                                    <h4 class="distance_text">Journey Distance: <b>${carData.distance}les</b> <strong>(${carData.duration})</strong></h4>
                                    <a href="javascript:;" onclick="share_give_quote('${carData.id}');" class="make_offer_btn checkStatus">Place bid</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $('#carDetailsModalBody').html(modalBodyContent);
                }
                $('#carDetailsModal').modal('show');
                var $slider = $('.slider');
                $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                    var i = (currentSlide ? currentSlide : 0) + 1;
                    $('.current-slide').text(i);
                    $('.total-slides').text(slick.slideCount);
                });

                $slider.slick({
                    infinite: false,
                    speed: 300,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    prevArrow: '<div class="slick-prev"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0756 16.5115L1.85822 10.7965C1.31976 10.4441 1 9.87387 1 9.26607C1 8.65827 1.31976 8.08803 1.85822 7.73561L10.0756 1.48823C10.7708 0.976677 11.7151 0.857068 12.5347 1.17696C13.3543 1.49685 13.917 2.20438 14 3.01972V14.984L14 14.984C13.9156 15.7986 13.3523 16.5049 12.533 16.8238C11.7136 17.1427 10.7702 17.0228 10.0756 16.5115Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
                    nextArrow: '<div class="slick-next"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.9244 1.48852L13.1418 7.20349C13.6802 7.5559 14 8.12613 14 8.73393C14 9.34173 13.6802 9.91197 13.1418 10.2644L4.9244 16.5118C4.22923 17.0233 3.28491 17.1429 2.46532 16.823C1.64573 16.5032 1.08303 15.7956 1 14.9803L1 3.01597C1.08445 2.20143 1.6477 1.49505 2.46703 1.17615C3.28636 0.857255 4.22984 0.977185 4.9244 1.48852Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>'
                });
            });
            $('#backButton').on('click', function() {
                $('#carDetailsModal').modal('hide');
            });

            $('.local_srch_box').click(function() {
                $('.local_srch_fillterbx').slideToggle("slow");
            });
            $('.where_box label').click(function() {
                var location = $(this).text();
                $('#search_pick_up_area').val(location);
                $('.where_box').hide();
                var errorElement = $('#search_pick_up_area-error');
                if (errorElement.length) {
                    $('#search_pick_up_area').closest('.form-group').removeClass('error-margin');
                    errorElement.remove();
                }
            });

            // Click event for drop off area suggestions
            $('.to_box label').click(function() {
                var location = $(this).text();
                $('#search_drop_off_area').val(location);
                $('.to_box').hide();
                var errorElement = $('#search_drop_off_area-error');
                if (errorElement.length) {
                    $('#search_drop_off_area').closest('.form-group').removeClass('error-margin');
                    errorElement.remove();
                }
            });

             // Hide label on keyup in input field
            $('#search_pick_up_area').on('keyup', function() {
                if ($(this).val().length > 0) {
                    $('.where_box').hide();
                } else {
                    if(isMobile)
                        $('.where_box').show();
                }
            });

            $('#search_drop_off_area').on('keyup', function() {
                if ($(this).val().length > 0) {
                    $('.to_box').hide();  
                } else {
                    if(isMobile)
                        $('.to_box').show();
                }
            })

            // Check for the 'open_modal' parameter in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const openModalId = urlParams.get('share_quotation');
            if (openModalId) {
                // Trigger a click event for the check document status
                // if(isMobile) {
                    const carRowDiv = $(`ul.car-row[data-car-id="${openModalId}"]`);
                    if (carRowDiv.length) {
                        simulateClick(carRowDiv);
                        // setTimeout(function() {
                        //     share_give_quote(openModalId);
                        // }, 500); // Adjust the timeout duration as needed
                    }
                // } else {
                    //share_give_quote(openModalId);
                    //$(".checkStatus").click();
                // }
                 //Remove the share_quotation parameter from the URL
                if (history.pushState) {
                    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    window.history.pushState({ path: cleanUrl }, '', cleanUrl);
                }
            }
            function simulateClick(element) {
                element.trigger('click');
            }

            var $slider = $('.slider');
            $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                var i = (currentSlide ? currentSlide : 0) + 1;
                $('.current-slide').text(i);
                $('.total-slides').text(slick.slideCount);
            });

            $slider.slick({
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                prevArrow: '<div class="slick-prev"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0756 16.5115L1.85822 10.7965C1.31976 10.4441 1 9.87387 1 9.26607C1 8.65827 1.31976 8.08803 1.85822 7.73561L10.0756 1.48823C10.7708 0.976677 11.7151 0.857068 12.5347 1.17696C13.3543 1.49685 13.917 2.20438 14 3.01972V14.984L14 14.984C13.9156 15.7986 13.3523 16.5049 12.533 16.8238C11.7136 17.1427 10.7702 17.0228 10.0756 16.5115Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
                nextArrow: '<div class="slick-next"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.9244 1.48852L13.1418 7.20349C13.6802 7.5559 14 8.12613 14 8.73393C14 9.34173 13.6802 9.91197 13.1418 10.2644L4.9244 16.5118C4.22923 17.0233 3.28491 17.1429 2.46532 16.823C1.64573 16.5032 1.08303 15.7956 1 14.9803L1 3.01597C1.08445 2.20143 1.6477 1.49505 2.46703 1.17615C3.28636 0.857255 4.22984 0.977185 4.9244 1.48852Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>'
            });


            $('#message').on('keydown paste input', function(event) {
                if (event.type === 'keydown' && event.key >= '0' && event.key <= '9') {
                    event.preventDefault();
                }
                if (event.type === 'paste') {
                    let pastedData = event.originalEvent.clipboardData.getData('text');
                    if (/\d/.test(pastedData)) {
                        event.preventDefault();
                    }
                }
                if (event.type === 'input') {
                    let newValue = $(this).val().replace(/[0-9]/g, '');
                    $(this).val(newValue);
                }
            });

        });

        function formatAddress(address) {
            var addressParts = address.split(',');
            var firstPart = addressParts[0].trim();
            var lastTwoParts = addressParts.slice(-2);
            var limitedAddress = lastTwoParts.join(',');
            return limitedAddress;
        }
        function formatCustomDate(date) {
            var d = new Date(date);
            var day = String(d.getDate()).padStart(2, '0');
            var month = String(d.getMonth() + 1).padStart(2, '0'); // getMonth() returns month from 0-11
            var year = String(d.getFullYear()).slice(-2); // Get last two digits of the year

            return `${day}/${month}/${year}`;
        }

        const setActive = (el, active) => {
            const formField = el.parentNode
            if (active) {
                formField.classList.add('field_active')
            } else {
                //formField.classList.remove('field_active')
                el.value === '' ?
                    formField.classList.remove('field_filled') :
                    formField.classList.add('field_filled')
            }
        }

        // Select all form-control elements
        const formControls = document.querySelectorAll('.form-control');

        // Add event listeners for focus and blur to form-control elements
        formControls.forEach(el => {
            el.onblur = () => {
                setActive(el, false);
            };
            el.onfocus = () => {
                setActive(el, true);
            };
        });

        // Select all form-group divs
        const formGroups = document.querySelectorAll('.form-group');

        // Add event listeners for click to form-group divs
        formGroups.forEach(group => {
            group.onclick = (e) => {
                // Find the input element within the div
                const input = group.querySelector('.form-control');
                if (input && e.target !== input) {
                    input.focus();
                }
            };
        });

        // reset field
        function resetcode()
        {
            var element = document.getElementByClass("resetdata");
            element.reset();
        }

        // function initialize_search_pick_up_area() {
        //     var input = document.getElementById('search_pick_up_area');
        //     var options = {
        //         //types: [''],
        //         componentRestrictions: {country: "in"}
        //     };
        //     var autocomplete = new google.maps.places.Autocomplete(input);
        //     autocomplete.addListener('place_changed', function() {
        //         var place = autocomplete.getPlace();
        //         if (!place.geometry) {
        //             return;
        //         }
        //         var pick_latitude = place.geometry.location.lat();
        //         var pick_longitude = place.geometry.location.lng();
        //
        //         $('#pick_up_latitude').val(pick_latitude);
        //         $('#pick_up_longitude').val(pick_longitude);
        //     });
        // }
        // google.maps.event.addDomListener(window, 'load', initialize_search_pick_up_area);

        // function initialize_search_drop_off_area() {
        //     var input = document.getElementById('search_drop_off_area');
        //     var options = {
        //         //types: [''],
        //         componentRestrictions: {country: "in"}
        //     };
        //     var autocomplete = new google.maps.places.Autocomplete(input);
        //     autocomplete.addListener('place_changed', function() {
        //         var place = autocomplete.getPlace();
        //         if (!place.geometry) {
        //             return;
        //         }
        //         var drop_latitude = place.geometry.location.lat();
        //         var drop_longitude = place.geometry.location.lng();
        //
        //         $('#drop_off_latitude').val(drop_latitude);
        //         $('#drop_off_longitude').val(drop_longitude);
        //     });
        // }
        // google.maps.event.addDomListener(window, 'load', initialize_search_drop_off_area);

        function fetch_data(page,str='') {
            // var pick_up_latitude = $('#pick_up_latitude').val();
            // var pick_up_longitude = $('#pick_up_longitude').val();
            // var drop_off_latitude = $('#drop_off_latitude').val();
            // var drop_off_longitude = $('#drop_off_longitude').val();
            if(str == '') {
                $('#popup').addClass('show'); // Show the popup
            }
            var search_pick_up_area = $('#search_pick_up_area').val();
            var search_drop_off_area = $('#search_drop_off_area').val();
            $.ajax({
                url: globalSiteUrl + "/transporter/find_job?page=" + page,
                data: {
                    // pick_up_latitude: pick_up_latitude,
                    // pick_up_longitude: pick_up_longitude,
                    // drop_off_latitude: drop_off_latitude,
                    // drop_off_longitude: drop_off_longitude,
                    search_pick_up_area: search_pick_up_area,
                    search_drop_off_area: search_drop_off_area,
                },
                type: "GET",
                success: function (res) {
                    if(res.success == true){
                        $('#popup').removeClass('show');
                        $('.jobsrch_blogs').addClass('d-none');
                        $('#idLoadData').html(res.data);
                        if(isMobile) {

                            $('.jobsrch_form_blog').addClass('d-none');
                            $('.admin_job_top h3').text('Your results');
                            $('.pera_srch').text('Here are some jobs we’ve found that match your search.');
                            $('html, body').scrollTop(0);
                        }
                        //toastr.success(res.message);
                        checkAndHideSections();
                    } else{
                        $('#popup').removeClass('show');
                        toastr.error(res.message);
                    }
                }
            });
        }
        $('#search_job').on('click', function () {
            var form = $('#jobsrch_form_blog');
            // Trigger form validation
            if (form.valid()) {
                fetch_data(1);
            }
        });

        $(document).on('click', '.after_search a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page,'pagination');
        });

        $(document).on('click', '.before_search a', function (event) {
            event.preventDefault();
            var baseUrl = window.location.origin; // e.g., http://127.0.0.1:8000
            var path = '/transporter/new-jobs-new';
            var page = $(this).attr('href').split('page=')[1];
            var newUrl = baseUrl + path + '?page=' + page;
            window.location.href = newUrl;
        });

        function checkAndHideSections() {
            if ($('#idLoadData').children().length > 0) {
                $('.pagination.before_search').hide();
                $('.job-data').hide();
            } else {
                $('.pagination.before_search').show();
                $('.job-data').show();
            }
        }
    </script>
@endsection