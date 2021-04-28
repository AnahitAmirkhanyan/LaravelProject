@extends('layout')

@section('content')
    <h1>Special Characters</h1>

    HTML special "character entities" start with ampersand (<span>&amp;</span>) and
    end with semicolon (<span>;</span>), like "<span>&amp;euro;</span>" = "&euro;".  The
    ever-popular "no-break space" is <span>&amp;nbsp;</span>.  There are special
    entity names for accented Latin letters and other West European special
    characters such as:

    <p>
    <blockquote>
        <table class="">
            <tr>
                <td><span>&amp;auml;</span>
                <td>a-umlaut
                <td>&nbsp;&auml;&nbsp;

            <tr>
                <td><span>&amp;Auml;</span>
                <td>A-umlaut
                <td>&nbsp;&Auml;&nbsp;

            <tr>
                <td><span>&amp;aacute;</span>
                <td>a-acute
                <td>&nbsp;&aacute;&nbsp;

            <tr>
                <td><span>&amp;agrave;</span>
                <td>a-grave
                <td>&nbsp;&agrave;&nbsp;

            <tr>
                <td><span>&amp;ntilde;</span>
                <td>n-tilde
                <td>&nbsp;&ntilde;&nbsp;

            <tr>
                <td><span>&amp;szlig;</span>
                <td>German double-s
                <td>&nbsp;&szlig;&nbsp;

            <tr>
                <td><span>&amp;thorn;</span>
                <td>Icelandic thorn
                <td>&nbsp;&thorn;&nbsp;
        </table>
    </blockquote>
    <p>

        (The table above is shown in the basic, default style of HTML.  Of course
        there are many ways to customize the appearance of tables, but that's beyond
        the scope of this tutorial.)
    <p>
        Examples:

    <dl>
        <dt>For <b>Spanish</b> you would need:
        <dd><span>&amp;Aacute;</span> (&Aacute;),
            <span>&amp;aacute;</span> (&aacute;),
            <span>&amp;Eacute;</span> (&Eacute;),
            <span>&amp;eacute;</span> (&eacute;),
            <span>&amp;Iacute;</span> (&Iacute;),
            <span>&amp;iacute;</span> (&iacute;),
            <span>&amp;Oacute;</span> (&Oacute;),
            <span>&amp;oacute;</span> (&oacute;),
            <span>&amp;Uacute;</span> (&uacute;),
            <span>&amp;uacute;</span> (&uacute;),
            <span>&amp;Uuml;</span> (&Uuml;),
            <span>&amp;uuml;</span> (&uuml;),
            <span>&amp;Ntilde;</span> (&Ntilde;),
            <span>&amp;ntilde;</span> (&ntilde;);
            <span>&amp;iquest;</span> (&iquest;);
            <span>&amp;iexcl;</span> (&iexcl;).<br>
            Example: A&ntilde;orar&aacute;n = <span>A&amp;ntilde;orar&amp;aacute;n</span>.

            <p>

        <dt>For <b>German</b> you would need:
        <dd><span>&amp;Auml;</span> (&Auml;),
            <span>&amp;auml;</span> (&auml;),
            <span>&amp;Ouml;</span> (&Ouml;),
            <span>&amp;ouml;</span> (&ouml;),
            <span>&amp;Uuml;</span> (&uuml;),
            <span>&amp;uuml;</span> (&uuml;),
            <span>&amp;szlig;</span> (&szlig;).<br>
            Example: Gr&uuml;&szlig;e aus K&ouml;ln = <span>Gr&amp;uuml;&amp;szlig;e aus K&amp;ouml;ln</span>.

    </dl>
    <p>

        When the page encoding is
        <a href="https://en.wikipedia.org/wiki/UTF-8">UTF-8</a>, which is
        recommended, you can also enter any character at all, Roman,
        Cyrillic, Arabic, Hebrew, Greek. Japanese,
        etc, either as numeric entities or (if you have a way to type them) directly
        from the keyboard.

    <p>

        And remember: if you want to
        include <span>&lt;</span>, <span>&amp;</span>,
        or <span>&gt;</span> literally in text to be displayed, you have
        to write <span>&amp;lt;</span>,
        <span>&amp;amp;</span>, <span>&amp;gt;</span>, respectively.

    <p>
    <hr>
    <p>

@endsection
