@extends('layout')

@section('content')
    <h1>Effects</h1>

    The rest of this document shows some of what you can do with simple HTML
    commands, but I don't explain how to do it.  To see that, just tell your
    browser to <b>View Source</b> and compare the HTML in the source window with
    the result in the original window.

    <blockquote>

        <i>Note:</i> In this and the following
        sections, I use some "deprecated" features from earlier HTML versions
        because they are easier for beginners to learn (for
        example <span class="tt">&lt;big&gt;...&lt;/big&gt;</span> versus
        <span class="tt" style="white-space:pre">
&lt;span style="font-size:120%"&gt;...&lt;/span&gt;</span>).

    </blockquote>

    <p>

        <b>This sentence is bold.</b> <i>This sentence is
            in italics.</i> <b><i>This sentence is in bold italics.</i></b> <span class="tt">This
sentence is in typewriter font.</span> This sentence has <u>underlined
            words</u> and <u><b>underlined bold words</b></u>.

        <font color="blue">This</font>
        <font color="red">sentence</font>
        <font color="green">has</font>
        <font color="brown">colored</font>
        <font color="magenta">words</font>.

        This sentence has <big>big
            words.</big> This one has <big><big>very big words</big></big>.  This one has
        <small><small>very small words.</small></small>

    <p>
        <blockquote>

            This is a "blockquote", which is like a regular paragraph, but it has bigger
            margins.  Begin a blockquote with <span class="tt">&lt;blockquote&gt;</span> and end
            it with <span class="tt">&lt;/blockquote&gt;</span>.  Environments such as blockquotes,
            lists, etc, that have a beginning and an end always use paired commands like
            <span class="tt">&lt;<i>blah</i>&gt;...&lt;<i>/blah</i>&gt;</span>.

    <p>
    <blockquote>

        This is a blockquote inside another blockquote, which shows how HTML
        environments can be "nested".

    </blockquote>
    <p>

        Here we are back in the first blockquote again.

        </blockquote>
    <p>

        And here we are back outside of the first blockquote.

    <p>

        NOTE: Many of the HTML tags used to make the special effects shown above
        were changed in the transition from HTML4 to HTML5 (e.g.
        &lt;big&gt;,
        &lt;small&gt;,
        &lt;u&gt;,
        &lt;font&gt;,
        etc) but are still recognized by HTML5 even though now they are "deprecated"
        and "incorrect" even though they were "correct" before.

    <p>
    <hr>
    <p>

@endsection

