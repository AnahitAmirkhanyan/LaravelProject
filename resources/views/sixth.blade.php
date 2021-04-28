@extends('layout')

@section('content')

    <h1>Lists</h1>
    Here is an Unordered (bullet) List (<span class="tt">&lt;ul&gt;..&lt;ul&gt;</span>):

    <ul>
        <li>This is a List Item (<span class="tt">&lt;li&gt;</span>).
        <li>This is another item.
        <li>This is yet another item.
    </ul>

    Here is an Ordered (numbered) List (<span class="tt">&lt;ol&gt;..&lt;ol&gt;</span>):

    <p>
    <ol>
        <li>This is a List Item (<span class="tt">&lt;li&gt;</span>).
        <li>This is another item.
        <li>This is yet another item.
    </ol>
    <p>

        And here is a Description List (<span class="tt">&lt;dl&gt;</span>).
        using Kermit commands as an example:

    <p>
        <dl>

            <dt><span class="tt">SET FILE TYPE BINARY</span>

            <dd>This command tells Kermit to transfer files in binary mode.  In other
                words, don't mess with the file, just send it as-is.  The result on the
                receiving computer should be identical to the original.

    <p>

        <dt><span class="tt">SET FILE TYPE TEXT</span>

        <dd>This command tells Kermit to transfer files in text mode.  This should be
            used with plain-text files, especially when transferring them between
            computers with different file formats or operating systems, such as VMS and
            Unix, or Unix and Windows.  It converts the file's format and character-set
            (if necessary) so the received file is usable on the destination computer.

            </dl>
    <p>

        You can have lists within lists:

    <p>
    <ol>
        <li>A gromet
        <li>A widget
        <li>A framus, which consists of the following components:
            <ul>
                <li>A doohickey.
                <li>A veeblefetzer -- these come in several colors:
                    <ol>
                        <li>Purple
                        <li>Purple
                        <li>Purple
                    </ol>
                <li>A whatchamacallit.
            </ul>
        <li>A doodad.
    </ol>

    <p>

        And you can have ordered lists that use letters instead of numbers:

    <p>

    <ol type="a">
        <li>Pennies
        <li>Nickels
        <li>Dimes
        <li>Quarters
    </ol>

    <p>
    <hr>

@endsection
