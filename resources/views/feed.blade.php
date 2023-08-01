<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Preveri Podjetje - Anonimno oceni zaposlitev ]]></title>
        <link><![CDATA[ https://preveri-podjetje.si/feed ]]></link>
        <description><![CDATA[ Preveri ali oceni delodajalce glede zaposlitve. Popolnoma anonimno in brez registracije ! ]]></description>
        <language>sl</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link> {{ 'https://preveri-podjetje.si/podjetja/'.$post->slug }}</link>
                <description>Matična številka: {{$post->reg_no}}, Pravnoorganizacijska oblika: {{$post->legal_organizational_form}}</description>
                <address>Naslov: {{$post->street.' '.$post->house_no.', '.$post->postal_code.' '.$post->post_office}}</address>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>