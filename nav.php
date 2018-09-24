<!-- ########################## Main Navigation ########################## -->

<nav>
    <ul>
        <!-- Home Button -->
       <?php
        print '<li class="';
        if ($path_parts['filename'] == "index") {
            print ' activePage ';
        }     
        print '">';
        print '<a href="index.php">Home</a>';
        print '</li>';
       ?>
        
        <!-- About Page -->
        <?php
        print '<li class="';
        if ($path_parts['filename'] == "about") {
            print ' activePage ';
        }     
        print '">';
        print '<a href="about.php">About</a>';
        print '</li>';
       ?>
        
        <!-- Recent Work -->
       <?php
        print '<li class="';
        if ($path_parts['filename'] == "work") {
            print ' activePage ';
        }     
        print '">';
        print '<a href="work.php">Recent Works</a>';
        print '</li>';
       ?>
        
        <!-- Contact/ Enquiries -->
        <?php
        print '<li class="';
        if ($path_parts['filename'] == "contact") {
            print ' activePage ';
        }     
        print '">';
        print '<a href="contact.php">Contact</a>';
        print '</li>';
       ?>
        
    </ul>
</nav>


