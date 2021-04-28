@extends('layout' , ['test' => 'hello test'])

@section('content')
    <h1>HTML Syntax</h1>

    Web pages are written in Hyper Text Markup Language (HTML).  HTML has three
    special characters:
    <span class="tt">&lt;</span>, <span class="tt">&amp;</span>, <span class="tt">&gt;</span>.
    An HTML command is enclosed in <span class="tt">&lt;...&gt;</span>, for example
    <span class="tt">&lt;p&gt;</span>, which is a paragraph separator, or <span class="tt">&lt;b&gt;</span>
    ("begin bold") and <span class="tt">&lt;/b&gt;</span> ("end bold").  So the following
    HTML text:

    <p>
    <blockquote>
<pre>
This sentence contains &lt;b&gt;bold&lt;/b&gt; text.
</pre>
    </blockquote>
    <p>

        produces:

    <p>
    <blockquote>
        This sentence contains <b>bold</b> text.
    </blockquote>
    <p>

        A Web page starts with a series of HTML commands, and ends with
        a few more.  The contents go in between:

    <p>
    <blockquote>
<pre>
&lt;!DOCTYPE HTML&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
&lt;META charset="UTF-8"&gt;
&lt;META name="viewport"
 content="width=device-width, initial-scale=1.0"&gt;
&lt;title&gt;Sample Web Page&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
</pre>
        <p>
            <i>(Contents go here)</i>
        <p>
        <pre>
&lt;/body&gt;
&lt;/html&gt;
</pre>
    </blockquote>
    <p>

        The first line (<span class="tt">DOCTYPE</span>) specifies which markup
        language the page uses
        (<a href="https://en.wikipedia.org/wiki/HTML">HTML</a> = Hypertext Markup
        Language); just copy this line.  The next
        line, <span class="tt">&lt;html&gt;</span>, starts the page, and is matched
        by the last line, <span class="tt">&lt;/html&gt;</span>, which closes the
        page.  <span class="tt">&lt;head&gt;</span>, starts the heading, which
        contains a title to be displayed on the browser's title bar and a
        declaration of the character set (nowadays it should always be
        <a href="https://en.wikipedia.org/wiki/UTF-8">UTF-8</a>) and the "viewport"
        line which is a compulsory adaptation for cell phones, "smart" watches, etc.
        <span class="tt">&lt;/head&gt;</span> closes the heading.

    <p>

        The <span class="tt">&lt;body&gt;</span> tag starts the body of the
        document, is closed by <span class="tt">&lt;/body&gt;</span> tag.

    <p>

        As you can see, most HTML commands come in begin-end pairs:
        <span class="tt">&lt;b&gt;...&lt;/b&gt;</span>,
        <span class="tt">&lt;head&gt;...&lt;/head&gt;</span>, etc.  The closing part of the command
        has a slash (<span class="tt">/</span>) between the <span class="tt">&lt;</span> and the first letter of
        the command.

    <p>


        Blank lines and line breaks are ignored.  The browser automatically "flows"
        your text into lines and paragraphs that fit in its window.  Paragraphs must
        be separated by <span class="tt">&lt;p&gt;</span>.  Line breaks can be forced by
        <span class="tt">&lt;br&gt;</span>.

    <p>
    <dl>
        <dt><i>Example for Windows:</i>

        <dd>Use the mouse to copy the HTML above into NotePad.  Then save the file
            (<i>File</i>&nbsp;<span class="tt">-&gt;</span>&nbsp;<i>Save&nbsp;As...</i>)
            in your Web directory as <span class="tt">index.html</span>.  Suppose your Windows username
            is Olga.  Then (depending on which version of Windows you have) this might
            be:

            <p>
            <blockquote>
<pre>
<span class="tt">C:\Users\Olga\Desktop\Web\index.html</span>
</pre>
            </blockquote>
            <p>

                Now to see your new web page, just double-click on the Web folder and
                then double-click on <span class="tt">index.html</span>.
    </dl>
    <p>

        Now you're ready to start adding "content" to your web page.  Go back to
        NotePad and replace the title and "(Contents go here)" with whatever you
        want.  Any time you want to see the result, use
        <i>File</i>&nbsp;<span class="tt">-&gt;</span>&nbsp;<i>Save</i> in NotePad and then
        click the Reload button on your browser.

    <p>

        The next sections tell how to achieve different kinds of effects.

@endsection

