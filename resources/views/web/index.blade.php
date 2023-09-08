<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        @include('web.css')
    </head>
    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main>
            @include('web.search')
            @include('web.learn')
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.topBooks')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.explore')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            @include('web.review')
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.statics')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.instructors')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.books')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.newsletter')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.education')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web/footer')
            <!-- <section> close ============================-->
            <!-- ============================================-->
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        @include('web.script')
    </body>
</html>
