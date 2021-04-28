@extends('layout')

@section('content')
    <h1>Converting Plain Text to HTML</h1>

    If you have a plain text file that you want to convert to HTML, load the
    file into a plain-text editor and then follow these steps.

    <p>
    <ol>
        <li>Change all occurrences of "<span class="tt">&amp;</span>" to "<span class="tt">&amp;amp;</span>".
        <li>Change all occurrences of "<span class="tt">&lt;</span>" to "<span class="tt">&amp;lt;</span>".
        <li>Change all occurrences of "<span class="tt">&gt;</span>" to "<span class="tt">&amp;gt;</span>".
        <li>Change any accented letters to HTML entity names (previous section)*.
        <li>Put "<span class="tt">&lt;p&gt;</span>" between each paragraph.
        <li>Insert the standard prolog at the top, substituting an appropriate title.
        <li>Insert the standard epilog at the bottom.
        <li>Save the result as <span class="tt"><i>xxx</i>.html</span>, where
            <span class="tt"><i>xxx</i></span> is the part of the original file's name before the dot.
            For example, if the original file was <span class="tt">letter.txt</span>, save the edited
            version as <span class="tt">letter.html</span>.
    </ol>
    <p>

        If you are a <a href="http://kermitproject.org/about.html">Kermit</a> user, you
        can find a script to convert plain text to HTML
        <a href="http://kermitproject.org/html.html">HERE</a>.

    <p>

        If the text contains lists, tables, or other structures, read on.

    <p>

        If you have a Microsoft Word document you want to convert to HTML, and your
        copy of Word does not allow the file to be "Saved As" HTML, then save it as
        plain text and follow the same instructions.  In this case you lose the
        "richness" (bold, italics, font changes, etc) when you save the file, and
        will have to put the effects back by hand (next section).

    <p>
    <div style="font-size:86%">
        <table style="font-size:86%; width:66%; border-top:1px solid black;">
            <tr>
                <td style="vertical-align:top; font-size:18px">*
                <td> Not necessary if your text is already encoded as UTF-8.  If it's not
                    UTF-8, you can identify the encoding in the &lt;META charset="..."&gt;
                    directive, but this topic is a bit advanced for this simple tutorial.
        </table>
    </div>

@endsection
