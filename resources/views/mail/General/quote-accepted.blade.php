<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
</head>

<body style="margin: 0;font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">

<div style="max-width: 600px;width: 100%;margin: auto;text-align: center;padding: 0;box-sizing: border-box;">
    <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
        style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
        alt="transport notifiaction" title="transport notifiaction" />
    <h2 style="margin: 0;font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Hi,</h2>
    <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; margin-top: 25px; margin-bottom: 25px;">
        Your £{{ number_format($quote['transporter_payment'], 0) }} bid  for 
         {{$quote['vehicle_make']}} {{$quote['vehicle_model']}} 
        @if(!is_null($quote['vehicle_make_1']) && !is_null($quote['vehicle_model_1']))
        / {{$quote['vehicle_make_1']}} {{$quote['vehicle_model_1']}}
        @endif delivery has been accepted by {{ $quote['username'] }}.
    </p>
    <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; margin-top: 25px; margin-bottom: 25px;">Contact the customer as soon as possible to make arrangements and finalise the delivery.</p>
    <div class="details" style="margin-bottom: 25px;border-bottom: 1px solid #ddd5d5;padding-bottom: 25px;">
        <h2 style="font-size: 18px;line-height:24px;text-align: left;margin-bottom: 10px;font-weight: 700;">Collection details</h2>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Contact name:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['collection_contact_name'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Mobile number:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['collection_mobile_number'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Email address:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['collection_email'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Pickup address:</div>
            <div style="width: 50%;"> 
                @if($quote['quotation_detail']['collection_address'])
                {{ $quote['quotation_detail']['collection_address'] }}
                @else
                    <p>{{ $quote['quotation_detail']['collection_address_1'] }}</p>
                    <p>{{ $quote['quotation_detail']['collection_address_2'] }}</p>
                    <p>{{ $quote['quotation_detail']['collection_town'] }}</p>
                    <p>{{ $quote['quotation_detail']['collection_country'] }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="details" style="margin-bottom: 25px;border-bottom: 1px solid #ddd5d5;padding-bottom: 25px;">
        <h2 style="font-size: 18px;line-height: 24px;text-align: left;margin-bottom: 10px;font-weight: 700;">Delivery details</h2>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Contact name:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['delivery_contact_name'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Mobile number:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['delivery_mobile_number'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Email address:</div>
            <div style="width: 50%;">{{ $quote['quotation_detail']['delivery_email'] }}</div>
        </div>
        <div  class="list" style="font-weight: 500;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%;">Delivery address:</div>
            <div style="width: 50%;"> 
                @if($quote['quotation_detail']['delivery_address'])
               {{ $quote['quotation_detail']['delivery_address'] }}
                @else
                
                    {{ $quote['quotation_detail']['delivery_address_1'] }}<br>
                    {{ $quote['quotation_detail']['delivery_address_2'] }}<br>
                    {{ $quote['quotation_detail']['delivery_town'] }}<br>
                    {{ $quote['quotation_detail']['delivery_country'] }}
                
                @endif
            </div>
        </div>
    </div>
    <div class="job-info" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;margin-bottom: 50px;">
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">Make & model:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">
                 {{$quote['vehicle_make']}} {{$quote['vehicle_model']}} 
                @if(!is_null($quote['vehicle_make_1']) && !is_null($quote['vehicle_model_1']))
                / {{$quote['vehicle_make_1']}} {{$quote['vehicle_model_1']}}
                @endif
            </div>
        </div>
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">Pick-up area:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">{{ $quote['pickup_postcode'] ?? '-' }}</div>
        </div>
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">Drop-off area:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">{{ $quote['drop_postcode'] ?? '-' }}</div>
        </div>
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;"> Delivery date:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;"> 
                 @if($quote['delivery_timeframe_from'])
               {{ formatCustomDate($quote['delivery_timeframe_from']) }}
                @else
                {{$quote['delivery_timeframe']}}
                @endif
            </div>
        </div>
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">Starts & drives:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;"> 
                {{$quote['starts_drives'] == 0 ? 'No' : 'Yes'}}
                @if(!is_null($quote['starts_drives_1']))
                / {{$quote['starts_drives_1'] == 0 ? 'No' : 'Yes'}}
                @endif
            </div>
        </div>
        <div class="list" style="display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;text-align: left;">
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">Delivery preference:</div>
            <div style="width: 50%; box-sizing: border-box; margin-bottom: 20px;">{{ $quote['how_moved'] }}</div>
        </div>
    </div>
    <p style="margin-top:0; margin-bottom:0; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Best Regards,</p>
    <p style="margin-top:12px; font-weight: 300;font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-bottom: 60px;">Transport Any Car Team</p>
    <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px; line-height: 22px; margin-top: 0; margin-bottom: 0;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
</div>
</body>

</html>

