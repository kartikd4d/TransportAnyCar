@extends('layouts.transporter.dashboard.app')
@section('head_css')
    <style>
        .adjust-space-without-btn {
            margin-bottom: 40px!important;
        }
        .jobsrch_info_list h6 {
            width: 10% !important;
        }

        .vehicle_image {
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
            font-size: 0;
            display: block;
        }

        .jobsrch_top_box .slick-arrow.slick-disabled svg {
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
        .bid_form span#message-error {
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

        /* .get_quote .modal-header .close {
                    position: absolute;
                    right: 15px;
                } */

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

        .modal_current p span.red {
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

        .jobserch_mob li span.sub_color {
            margin-left: 4px;
        }

        .job-data {
            margin-left: 0px;
            margin-bottom: 0px;
        }

        .job-data span {
            color: #9C9C9C;
            font-size: 15px;
        }

        /* #carDetailsModal .modal-header button.btn-close {
                    position: absolute;
                    top: 11px;
                    right: 15px;
                } */

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
            line-height: 18px;
        }

        #carDetailsModal .jobsrch_box {
            padding: 0;
            background: transparent;
            border-radius: 0;
            border: none;
            box-shadow: none;
            margin-bottom: 0;
        }

        #carDetailsModal .jobsrch_box .col-lg-6 {
            flex: auto;
            max-width: 100%;
        }

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

        .jobserch_mob li p {
            font-size: 15px;
            font-weight: 300;
            letter-spacing: 0em;
            color: #000;
            text-align: left;
            margin-bottom: 5px;
            display: block !important;
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

        .jobserch_mob .jobsrch_box {
            overflow: hidden;
        }

        small.expring_tag {
            position: absolute;
            background: #ED1C24;
            color: #fff;
            right: -54px;
            padding: 3px 32px;
            font-size: 12px;
            transform: rotate(50deg);
            top: -8px;
        }

        .content_container {
            padding: 95px 0 0px;
        }

        #page-content-wrapper {
            padding-bottom: 20px;
        }


        @media (min-width: 579px) {

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

            .jobserch_mob li p {
                display: none;
            }

            .jobserch_mob .job_new_grid_img {
                width: 16%;
                margin-bottom: 15px;
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

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

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
            .jobserch_mob .job_new_grid_miles span {
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
                position: inherit;
                top: 6px;
                right: 0;
                width: max-content;
                margin-left: auto;
                display: block;
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
                width: 13%;
                margin-bottom: 15px;
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

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

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
            .jobserch_mob .job_new_grid_miles span {
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

            .jobserch_mob li p {
                display: none !important;
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
                width: 13%;
                margin-bottom: 15px;
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

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

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
            .jobserch_mob .job_new_grid_miles span {
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


        @media(min-width: 1366px) {
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

            .jobserch_mob .job_new_grid_date {
                width: 19%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

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
            .jobserch_mob .job_new_grid_miles span {
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

            .jobserch_mob li p {
                display: block !important;
            }

        }


        @media(min-width: 1600px) {
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

            .jobserch_mob .job_new_grid_date {
                width: 19%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

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
            .jobserch_mob .job_new_grid_miles span {
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


        @media(max-width: 767px) {
            .jobserch_mob li p {
                display: none !important;
            }
        }

        /* end 16-09-2024 */


        @media(max-width: 580px) {
            .jobsrch_info_list li small {
                font-size: 14px;
                margin-left: 7px;
            }

            .jobsrch_info_list span {
                font-size: 14px;
                width: 47%;
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

            .modal-header span svg {
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
                padding: 22px 24px;
                box-shadow: none;
                font-size: 18px;
                color: #000;
            }

            .jobsrch_form_blog .form-control {
                font-size: 18px;
                /* color: #000000; */
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

            /* .modal-header button.btn-close {
                        position: absolute;
                        top: 11px;
                        right: 15px;
                    } */

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
                clear: both;
                padding-right: 10px;
            }

            .jobserch_mob ul.jobsrch_info_list li.job_new_grid_type {
                width: 59%;
                float: left;
                display: block;
                clear: both;
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
                font-size: 15px;
                font-weight: 400;
                width: 77%;
                line-height: 1;
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
                padding: 7px 33px 10px;
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
                right: -50px;
                padding: 3px 32px;
                font-size: 13px;
                transform: rotate(50deg);
                top: -12px;
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
                font-size: 12px;
                font-weight: 300;
            }

            .jobserch_mob_grid.new_job_design ul.jobsrch_info_list {
                width: 100%;
            }

            .jobserch_mob_grid {
                display: flex;
                flex-wrap: wrap;
                position: relative;
                padding-bottom: 11px;
                width: 100%;
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

            .jobserch_mob li p {
                display: none !important;
            }


        }

        @media(max-width: 400px) {
            .jobsrch_box {
                padding: 10px;
                margin-bottom: 24px;
            }

            .pop_new_btn .jobsrch_right_box {
                right: 5%;
            }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/globle.css') }}" />
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
                    <p>Please check your spam or junk folder and mark email as ‘not spam’ so that you don’t miss out on any
                        important email notifications. You can unsubscribe from job alert emails at any time within your
                        profile.</p>
                    <button onclick="hideBanner()" class="btn btn-success">Ok, got it</button>
                </div>

                <div class="job_container">
                    <div class="admin_job_bx find_trans_newjob list_of_items" id="style-1">
                        <section class="transportSection container">
                            <div class="admin_job_top" style="margin-bottom:20px!important;">
                                <h3>Your results</h3>
                            </div>
                            <div class="">
                                <div id="popup" class="">
                                    <p>Searching for transport jobs that match your criteria...</p>
                                    <img src="/uploads/loading-popup.gif" alt="Loading">
                                </div>
                                <p class="pera_srch">Here are some jobs we’ve found that match your search.</p>
                                <form id="jobsrch_form_blog" class="jobsrch_form_blog d-none" novalidate="novalidate">
                                    <div class="form-group where_custom field_active field_filled">
                                        <label id="pickupLabel">Where from?</label>
                                        <input type="text" class="form-control" name="search_pick_up_area" id="search_pick_up_area"
                                            placeholder="Search collection area " aria-invalid="false">
                                        <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
                                        <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
                                        <svg class="svgvector_mob d-md-none d-block" width="22" height="22" viewBox="0 0 30 30"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                                                stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
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

                                    <div class="form-group drop_off_box field_active field_filled">
                                        <label id="dropoffLabel">Where to?</label>
                                        <input type="text" class="form-control" name="search_drop_off_area" id="search_drop_off_area"
                                            placeholder="Anywhere" aria-invalid="false">
                                        <input type="hidden" name="drop_off_latitude" id="drop_off_latitude">
                                        <input type="hidden" name="drop_off_longitude" id="drop_off_longitude">
                                        <svg class="svgvector_mob d-md-none d-block" width="22" height="22" viewBox="0 0 30 30"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                                                stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
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
                                            <svg class="d-md-inline-block d-none" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="17" viewBox="0 0 16 17" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.21851 7.6448C1.21806 4.71363 3.28826 2.19034 6.16303 1.6181C9.0378 1.04585 11.9165 2.58403 13.0385 5.29194C14.1606 7.99984 13.2135 11.1233 10.7765 12.752C8.33955 14.3808 5.09138 14.0612 3.01851 11.9888C1.86613 10.8368 1.21864 9.27422 1.21851 7.6448Z"
                                                    stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M11.7075 11.9897L15.2185 15.5007" stroke="#F9FFF1" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg><span class="d-md-inline-block d-none">Search</span> <span
                                                class="d-md-none d-inline-block">Search jobs</span>
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="mainContentDiv d-none">
                                <div class="job-data" style="display: none;">
                                    <span>Results: 1-4 of 4</span>
                                </div>
                                <div id="orderlisting">
                                    <div class="boxContent">
                                        <div class="boxContentList">
                                            <h2 class="imgHeading">
                                                <span>Posted 1 min ago</span>
                                            </h2>
                                            <div class="boxImg-text car-row" data-car-id="653">
                                                <div class="imgCol">
                                                    <img src="http://localhost:8000/uploads/no_car_image.png" class=""
                                                        alt="image">
                                                </div>
                                                <div class="textCol">
                                                    <span class="hideMob">Posted 1 min ago</span>
                                                    <h2> 2024 Top Modal</h2>
                                                    <ul>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#52D017"></path>
                                                                </svg>
                                                            </i>
                                                            <span>Carrer de Tarragona, 141, Barcelona, Spain</span>
                                                        </li>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#ED1C24"></path>
                                                                </svg>
                                                            </i>
                                                            <span>Carrer de Tarragona, 141, Barcelona, Spain</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="contentBlockBtn">
                                                <div class="leftList">
                                                    <ul class="col-6 px-0 car-row" data-car-id="653">
                                                        <li>
                                                            <b>Expiry date:</b>
                                                            <span class="font-weight-light">
                                                                27/10/24
                                                            </span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery date:</b>
                                                            <span class="sub_color">ASAP</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery type:</b>
                                                            <span class="sub_color"> Transported</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Journey miles:</b>
                                                            <span class="sub_color">1</span>
                                                            <span class="grey">(1 min)</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="col-6 px-0">
                                                        <li class="colorDivgreen car-row" data-car-id="653">
                                                            <span><b>Current lowest bid:</b></span>
                                                            <span class="sub_color">£0</span>
                                                        </li>
                                                        <li class="colorDivBlue  mb-2 car-row" data-car-id="653">
                                                            <b>Transporters bidding: </b>
                                                            <span class="sub_color">0</span>
                                                        </li>
                                                        <li class="row mx-0 w-100 align-items-end mb-0">
                                                            <div class="btnCol">
                                                                <a href="javascript:;" onclick="share_give_quote('653');"
                                                                    class="w-100 mt-0 make_offer_btn checkStatus">Place bid</a>
                                                            </div>
                                                            <div class="iconDiv ml-4">
                                                                <a href="javascript:;" style="margin-left: auto;" class=""
                                                                    onclick="addToWatchlist('653');">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="none" stroke="#9C9C9C"
                                                                        class="bi bi-eye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z">
                                                                        </path>
                                                                        <circle cx="8" cy="8" r="3"></circle>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="actionDiv">
                                                    <div class="rotated-banner green">New</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boxContent">
                                        <div class="boxContentList">
                                            <h2 class="imgHeading">
                                                <span>Posted 21 hours ago</span>
                                            </h2>
                                            <div class="boxImg-text car-row" data-car-id="652">
                                                <div class="imgCol">
                                                    <img src="http://localhost:8000/uploads/no_car_image.png" class=""
                                                        alt="image">
                                                </div>
                                                <div class="textCol">
                                                    <span class="hideMob">Posted 21 hours ago</span>
                                                    <h2>tvs 2024</h2>
                                                    <ul>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#52D017"></path>
                                                                </svg>
                                                            </i>
                                                            <span>Calle del Príncipe de Vergara, 112, Madrid, Spain</span>
                                                        </li>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#ED1C24"></path>
                                                                </svg>
                                                            </i>
                                                            <span>Calle del Príncipe de Vergara, 112, Madrid, Spain</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="contentBlockBtn">
                                                <div class="leftList">
                                                    <ul class="col-6 px-0 car-row" data-car-id="652">
                                                        <li>
                                                            <b>Expiry date:</b>
                                                            <span class="font-weight-light">
                                                                26/10/24
                                                            </span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery date:</b>
                                                            <span class="sub_color">ASAP</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery type:</b>
                                                            <span class="sub_color"> Transported</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Journey miles:</b>
                                                            <span class="sub_color">1</span>
                                                            <span class="grey">(1 min)</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="col-6 px-0">
                                                        <li class="colorDivgreen car-row" data-car-id="652">
                                                            <span><b>Current lowest bid:</b></span>
                                                            <span class="sub_color">£0</span>
                                                        </li>
                                                        <li class="colorDivBlue  mb-2 car-row" data-car-id="652">
                                                            <b>Transporters bidding: </b>
                                                            <span class="sub_color">0</span>
                                                        </li>
                                                        <li class="row mx-0 w-100 align-items-end mb-0">
                                                            <div class="btnCol">
                                                                <a href="javascript:;" onclick="share_give_quote('652');"
                                                                    class="w-100 mt-0 make_offer_btn checkStatus">Place bid</a>
                                                            </div>
                                                            <div class="iconDiv ml-4">
                                                                <a href="javascript:;" style="margin-left: auto;" class=""
                                                                    onclick="addToWatchlist('652');">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="none" stroke="#9C9C9C"
                                                                        class="bi bi-eye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z">
                                                                        </path>
                                                                        <circle cx="8" cy="8" r="3"></circle>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boxContent">
                                        <div class="boxContentList">
                                            <h2 class="imgHeading">
                                                <span>Posted 5 days ago</span>
                                            </h2>
                                            <div class="boxImg-text car-row" data-car-id="651">
                                                <div class="imgCol">
                                                    <img src="http://localhost:8000/uploads/no_car_image.png" class=""
                                                        alt="image">
                                                </div>
                                                <div class="textCol">
                                                    <span class="hideMob">Posted 5 days ago</span>
                                                    <h2>M2R 2023</h2>
                                                    <ul>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#52D017"></path>
                                                                </svg>
                                                            </i>
                                                            <span>121 Rue Manin, Paris, France</span>
                                                        </li>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#ED1C24"></path>
                                                                </svg>
                                                            </i>
                                                            <span>121 Rue Manin, Paris, France</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="contentBlockBtn">
                                                <div class="leftList">
                                                    <ul class="col-6 px-0 car-row" data-car-id="651">
                                                        <li>
                                                            <b>Expiry date:</b>
                                                            <span class="font-weight-light">21/10/24</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery date:</b>
                                                            <span class="sub_color">ASAP</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery type:</b>
                                                            <span class="sub_color"> Transported</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Journey miles:</b>
                                                            <span class="sub_color">1</span>
                                                            <span class="grey">(1 min)</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="col-6 px-0">
                                                        <li class="colorDivgreen car-row" data-car-id="651">
                                                            <span><b>Current lowest bid:</b></span>
                                                            <span class="sub_color">£1000</span>
                                                        </li>
                                                        <li class="colorDivBlue  mb-2 car-row" data-car-id="651">
                                                            <b>Transporters bidding: </b>
                                                            <span class="sub_color">1</span>
                                                        </li>
                                                        <li class="row mx-0 w-100 align-items-end mb-0">
                                                            <div class="btnCol">
                                                                <a href="javascript:;" onclick="share_edit_quote('651');"
                                                                    class="w-100 mt-0 make_offer_btn checkStatus">Edit bid</a>
                                                            </div>
                                                            <div class="iconDiv ml-4">
                                                                <a href="javascript:;" style="margin-left: auto;" class=""
                                                                    onclick="addToWatchlist('651');">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="none" stroke="#9C9C9C"
                                                                        class="bi bi-eye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z">
                                                                        </path>
                                                                        <circle cx="8" cy="8" r="3"></circle>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="actionDiv">
                                                    <div class="rotated-banner">Bidding</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boxContent">
                                        <div class="boxContentList">
                                            <h2 class="imgHeading">
                                                <span>Posted 5 days ago</span>
                                            </h2>
                                            <div class="boxImg-text car-row" data-car-id="650">
                                                <div class="imgCol">
                                                    <img src="http://localhost:8000/uploads/no_car_image.png" class=""
                                                        alt="image">
                                                </div>
                                                <div class="textCol">
                                                    <span class="hideMob">Posted 5 days ago</span>
                                                    <h2>2023 top</h2>
                                                    <ul>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#52D017"></path>
                                                                </svg>
                                                            </i>
                                                            <span>14100 La Carlota, Spain</span>
                                                        </li>
                                                        <li>
                                                            <i>
                                                                <svg width="16" height="22" viewBox="0 0 16 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                        fill="#ED1C24"></path>
                                                                </svg>
                                                            </i>
                                                            <span>14111 Louvigny, France</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="contentBlockBtn">
                                                <div class="leftList">
                                                    <ul class="col-6 px-0 car-row" data-car-id="650">
                                                        <li>
                                                            <b>Expiry date:</b>
                                                            <span class="font-weight-light">
                                                                21/10/24
                                                            </span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery date:</b>
                                                            <span class="sub_color">ASAP</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Delivery type:</b>
                                                            <span class="sub_color"> Transported</span>
                                                        </li>
                                                        <li class="colorDivBlue">
                                                            <b>Journey miles:</b>
                                                            <span class="sub_color">1062</span>
                                                            <span class="grey">(16 hours 6 mins)</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="col-6 px-0">
                                                        <li class="colorDivgreen car-row" data-car-id="650">
                                                            <span><b>Current lowest bid:</b></span>
                                                            <span class="sub_color">£100</span>
                                                        </li>
                                                        <li class="colorDivBlue  mb-2 car-row" data-car-id="650">
                                                            <b>Transporters bidding: </b>
                                                            <span class="sub_color">1</span>
                                                        </li>
                                                        <li class="row mx-0 w-100 align-items-end mb-0">
                                                            <div class="btnCol">
                                                                <a href="javascript:;" onclick="share_edit_quote('650');"
                                                                    class="w-100 mt-0 make_offer_btn checkStatus">Edit bid</a>
                                                            </div>
                                                            <div class="iconDiv ml-4">
                                                                <a href="javascript:;" style="margin-left: auto;" class=""
                                                                    onclick="addToWatchlist('650');">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="none" stroke="#9C9C9C"
                                                                        class="bi bi-eye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z">
                                                                        </path>
                                                                        <circle cx="8" cy="8" r="3"></circle>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="actionDiv">
                                                    <div class="rotated-banner">Bidding</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="idLoadData">
                                <style>
                                    @media (max-width: 580px) {
                                        .search_resu_sec .form-group.where_custom {
                                            padding: 10px 30px;
                                        }

                                        .srch-data {
                                            display: flex;
                                            align-items: center;
                                            justify-content: space-between;
                                            margin-bottom: 10px;
                                        }

                                        .srch-data span {
                                            color: #9C9C9C;
                                            font-size: 15px;
                                        }

                                        .srch-data a {
                                            font-size: 15px;
                                            color: #80b6f7;
                                            text-decoration: underline;
                                            font-weight: 700;
                                        }

                                        .jobserch_mob .jobsrch_box {
                                            margin-bottom: 7px;
                                            box-shadow: 0px 0px 4px 0px rgb(0 0 0 / 15%);
                                        }

                                        .jobserch_mob ul.jobsrch_info_list {
                                            width: 90%;
                                        }

                                        .search_sec_footer span {
                                            font-size: 17px;
                                            text-align: center;
                                            display: block;
                                            color: #616161;
                                            line-height: normal;
                                        }

                                        .search_sec_footer span a {
                                            color: #80b6f7 !important;
                                            text-decoration: underline !important;
                                            font-size: 17px;
                                            text-underline-offset: 5px;
                                            font-weight: 400;
                                        }

                                        .search_sec_footer .srch-data {
                                            justify-content: center;
                                        }

                                        .content_container {
                                            padding-bottom: 0;
                                        }

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
                                            margin-bottom: 20px;
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
                                            clear: both;
                                            padding-right: 10px;
                                        }

                                        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_type {
                                            width: 59%;
                                            float: left;
                                            display: block;
                                            clear: both;
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
                                            font-size: 15px;
                                            font-weight: 400;
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
                                            padding: 7px 33px 10px;
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
                                            font-size: 12px;
                                            font-weight: 300;
                                        }
                                    }
                                </style>

                                <div class="jobsrch_form_blog search_resu_sec mb-0 d-none" style="display:block !important">
                                    <div class="form-group where_custom">
                                        <label id="pickupLabel">Your job search</label>
                                        <input type="text" class="form-control" name="search_pick_up_area"
                                            id="search_pick_up_area" placeholder="Barcelona, Spain - Barcelona, Spain"
                                            disabled="">
                                        <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
                                        <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
                                        <svg class="svgvector_mob d-md-none d-block" width="30" height="30"
                                            viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                                                stroke="black" stroke-width="2.78571" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="savebtnS">
                                    <a href="#" id="saveSrch" class="make_offer_btn checkStatus">Save search</a>
                                </div>

                                <div class="srch-data">
                                    <div class="srch-data-filter">
                                        <span>Results: 1 of 1</span>
                                    </div>
                                    <a href="http://localhost:8000/transporter/new-jobs-new">Reset Search</a>
                                </div>

                                <div class="boxContent">
                                    <div class="boxContentList" id="search-results">
                                        <h2 class="imgHeading">
                                            <span>Posted
                                                1 min ago</span>
                                        </h2>
                                        <div class="boxImg-text car-row" data-car-id="653">
                                            <div class="imgCol">
                                                <img src="http://localhost:8000/uploads/no_car_image.png" class=""
                                                    alt="image" />
                                            </div>
                                            <div class="textCol">
                                                <span class="hideMob">Posted 1 min ago</span>
                                                <h2>2024 Top Modal</h2>
                                                <ul>
                                                    <li>
                                                        <i>
                                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                    fill="#52D017"></path>
                                                            </svg>
                                                        </i>
                                                        <span>Carrer de Tarragona, 141, Barcelona, Spain</span>
                                                    </li>
                                                    <li>
                                                        <i>
                                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                                                    fill="#ED1C24"></path>
                                                            </svg>
                                                        </i>
                                                        <span>Carrer de Tarragona, 141, Barcelona, Spain</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="contentBlockBtn">
                                            <div class="leftList">
                                                <ul class="col-6 px-0 car-row" data-car-id="653">
                                                    <li>
                                                        <b>Expiry date:</b>
                                                        <span class="font-weight-light">
                                                            27/10/24
                                                        </span>
                                                    </li>
                                                    <li class="colorDivBlue">
                                                        <b>Delivery date:</b>
                                                        <span class="sub_color">ASAP</span>
                                                    </li>

                                                    <li class="colorDivBlue">
                                                        <b>Delivery type:</b>
                                                        <span class="sub_color"> Transported</span>
                                                    </li>
                                                    <li class="colorDivBlue">
                                                        <b>Journey miles:</b>
                                                        <span class="sub_color">1 ft</span>
                                                        <span class="grey">(1 min)</span>
                                                    </li>
                                                </ul>
                                                <ul class="col-6 px-0">
                                                    <li class="colorDivgreen car-row" data-car-id="653">
                                                        <span><b>Current lowest bid:</b></span>
                                                        <span class="sub_color">£0</span>
                                                    </li>
                                                    <li class="colorDivBlue  mb-2 car-row" data-car-id="653">
                                                        <b>Transporters bidding: </b>
                                                        <span class="sub_color">0</span>
                                                    </li>
                                                    <li class="row mx-0 w-100 align-items-end mb-0">
                                                        <div class="btnCol">

                                                            <a href="javascript:;" onclick="share_give_quote('653');"
                                                                class="w-100 mt-0 make_offer_btn checkStatus">
                                                                Place bid</a>
                                                        </div>
                                                        <div class="iconDiv ml-4">
                                                            <a href="javascript:;" style="margin-left: auto;" class=""
                                                                onclick="addToWatchlist('653');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                    fill="none" stroke="#9C9C9C" class="bi bi-eye"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z">
                                                                    </path>
                                                                    <circle cx="8" cy="8" r="3"></circle>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="actionDiv">
                                                <div class="rotated-banner green">new</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pagination after_search"></div>
                                <div class="search_sec_footer">
                                    <div class="conatiner srch-data">
                                        <span>That’s all for now. Why not try<br>
                                            <a href="http://localhost:8000/transporter/new-jobs-new">editing your search</a> for more
                                            jobs.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection