<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function agentDashboard()
    {
        return view('agent.agent_dashboard');
    }
}
