@extends('emails.template')

@section('content')

    <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
        <table role="presentation" cellpadding="0" cellspacing="0" style="background:white;" width="100%" border="0">
            <tbody>
                <tr>
                    <td style="word-wrap:break-word;font-size:0px;padding:30px 30px 18px;" align="left">
                        <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:24px;line-height:22px;text-align:left;">
                            Welcome to {{ config('app.name') }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="word-wrap:break-word;font-size:0px;padding:0px 30px 16px;" align="left">
                        <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                            Hey <b>{{ $data->name }}</b>, thanks for signing up
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="word-wrap:break-word;font-size:0px;padding:0px 30px 6px;" align="left">
                        <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                            Your account is active, now you can enjoy the features available on the application.<br>
                            Your password is : <strong>{{ $password }}</strong>
                        </div>
                    </td>
                </tr>
                {{-- <tr>
                    <td style="word-wrap:break-word;font-size:0px;padding:8px 16px 10px;padding-bottom:16px;padding-right:30px;padding-left:30px;" align="left">
                        <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="left" border="0">
                            <tbody>
                                <tr>
                                    <td style="border:none;border-radius:25px;color:white;cursor:auto;padding:10px 25px;" align="center" valign="middle" bgcolor="#00a8ff">
                                        <a href="{{ route('activation', $data->kd_aktivasi) }}" style="text-decoration:none;background:#00a8ff;color:white;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;font-weight:400;line-height:120%;text-transform:none;margin:0px;" target="_blank">Activate Account</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> --}}
                <tr>
                    <td style="word-wrap:break-word;font-size:0px;padding:0px 30px 30px 30px;" align="left">
                        <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                            Thanks you so much.
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection
