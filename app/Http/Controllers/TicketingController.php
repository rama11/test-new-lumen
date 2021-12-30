<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TicketingController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	public function detail() {
        echo "ID Ticket Detail = " . $id_ticket;
	}

	public function openReserve() {
		echo "Get Reserve Open Ticket";
	}

	public function openParameter() {
        echo "Update Reserve Open Ticket";
    }

    public function openParameterDetail() {
        echo "Update Reserve Open Ticket";
    }

    public function openCreateReserve() {
        echo "Update Reserve Open Ticket";
    }

	public function openUpdateReserve() {
        echo "Update Reserve Open Ticket";
    }

    public function openEmailParameter() {
        echo "Get Email Parameter";
    }

    public function openEmailTemplate() {
        echo "Get Email Template";
    }

    public function openEmailSend(Request $id_ticket){
        echo "Send Email Template";
    }

    public function pendingShow(Request $id_ticket) {
        echo "Get Pending Ticket Data";
    }

    public function pendingData(Request $id_ticket) {
        echo "Get Pending Ticket Data";
    }

    public function pendingEmailParameter(){
        echo "Get Email Parameter Pending";
    }

    public function pendingEmailTemplate(){
        echo "Get Email Template Pending";
    }

    public function pendingEmailSend(){
        echo "Send Email Template Pending";
    }

    public function pendingUpdate(){
        echo "Update Reserve Open Ticket";
    }

    public function cancelData() {
    	echo "cancel";
    }

	public function cancelEmailParameter() {
		echo "cancel";
	}

	public function cancelEmailTemplate() {
		echo "cancel";
	}

	public function cancelEmailSend() {
		echo "cancel";
	}

	public function closeData() {
		echo "close";
	}

	public function closeEmailParameter() {
		echo "close";
	}

	public function closeEmailTemplate() {
		echo "close";
	}

	public function closeEmailSend() {
		echo "close";
	}

}