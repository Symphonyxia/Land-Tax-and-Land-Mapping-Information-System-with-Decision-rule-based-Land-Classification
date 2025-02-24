<?php
include('security.php');
include('user_include/header.php');
include('user_include/navbar.php');
?>

    <style>
     body{
        color: black;
     }

        h2 {
            color: #333;
        }
        h3{
            font-weight: bold;
        }

        button{
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #sliderContent1, #sliderContent2, #sliderContent3, #sliderContent4, #sliderContent5, #sliderContent6, #sliderContent7, #sliderContent8, #sliderContent9, #sliderContent10 {
            display: none;
            margin-left: 20px;
            margin-right: 20px;

        }

        #sliderContent1 {
            display: block;
        }

        .navigation-btn {
            margin-top: 10px;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .button{
            margin-left: 20px;
        }

       
    </style>

<div id="sliderContent1">
    <h3>Appraisal/Assessment of newly constructed buildings and newly installed machineries</h3>
    <!-- Content for Appraisal/Assessment -->
    <p><strong>Availability of Service:</strong> 8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Building Permit</li>
    <li>Occupancy Permit</li>
    <li>Request for Assessment/Office Order duly approved by the City Assessor</li>
    <li>Sworn Statement declaring the true and current market value of the property</li>
    <li>Picture of the building with owner</li>
    <li>In case of machineries, an official receipt showing the acquisition cost thereof, if available</li>
    <li>One set documentary stamp if TD/DRPV is requested</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>

    <table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns employee to field inspection</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves / disapproves request; if approved, issues an office order for the conduct of inspection</td>
            <td>City Assessor</td>
            <td>2 hours</td>
        </tr>
        <tr>
            <td></td>
            <td>Conduct field inspection</td>
            <td>Local Assessment Operations Officer (LAOO)	</td>
            <td>6 days/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare Field Copy of Property Record Form (FCPRF) Property Record Form (PRF)</td>
            <td>LAOO Assessment Clerk	</td>
            <td>1 day/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
            <td>Tax Mapper	</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
        <td></td>
        <td>Affix Assessment of Real Property (ARP) number</td>
        <td>Assessment Clerk</td>
        <td>30 minutes/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>Evaluate documents submitted</td>
        <td>LAOO Assessment Clerk</td>
        <td>2 hours/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>Asst. City Assessor recommends approval/disapproval of documents for processing</td>
        <td>Asst. City Assessor</td>
        <td>2 hours/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>City Assessor approves/disapproves for processing documents submitted</td>
        <td>City Assessor</td>
        <td>2 hours/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>If approved, documents are returned to respective zones for encoding of data, generation of TD/DRPV and NARP</td>
        <td>LAOO Assessment Clerk</td>
        <td>2 hours/RPU</td>
    </tr>
        <tr>
            <td></td>
            <td>Documents are reviewed by LOGO-FIND Project personnel</td>
            <td>Administrative Assistant</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/disapproval of documents</td>
            <td>Asst. City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves/disapproves documents submitted</td>
            <td>City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td>Receive requested documents and NARP</td>
            <td>Release approved documents to client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>


    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(2)">Next</button>
</div>

<div id="sliderContent2">
    <h3>Reassessments of renovated, reconstructed and extended buildings</h3>
    <p><strong>Availability of Service:</strong> 8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Building Permit</li>
    <li>Occupancy Permit</li>
    <li>Request for Assessment/Office Order duly approved by the City Assessor</li>
    <li>Sworn Statement declaring the true and current market value of the property</li>
    <li>Picture of the building with owner</li>
    <li>In case of machineries, an official receipt showing the acquisition cost thereof, if available</li>
    <li>One set documentary stamp if TD/DRPV is requested</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>    
<table id="clientActionTable">
<thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns employee to field inspection</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves / disapproves request; if approved, issues an office order for the conduct of inspection</td>
            <td>City Assessor</td>
            <td>2 hours</td>
        </tr>
        <tr>
            <td></td>
            <td>Conduct field inspection</td>
            <td>Local Assessment Operations Officer (LAOO)	</td>
            <td>6 days/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare Field Copy of Property Record Form (FCPRF) Property Record Form (PRF)</td>
            <td>LAOO Assessment Clerk	</td>
            <td>1 day/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
            <td>Tax Mapper	</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
        <td></td>
        <td>Affix Assessment of Real Property (ARP) number</td>
        <td>Assessment Clerk</td>
        <td>30 minutes/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>Evaluate documents submitted</td>
        <td>LAOO Assessment Clerk</td>
        <td>2 hours/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>Asst. City Assessor recommends approval/disapproval of documents for processing</td>
        <td>Asst. City Assessor</td>
        <td>2 hours/RPU</td>
    </tr>
    <tr>
        <td></td>
        <td>City Assessor approves/disapproves for processing documents submitted</td>
        <td>City Assessor</td>
        <td>2 hours/RPU</td>
    </tr>
        <tr>
            <td>Receive requested documents and NARP</td>
            <td>Release approved documents to client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>


<button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(1)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(3)">Next</button></div>

<div id="sliderContent3">
    <h3>Transfer of the name of declared owner of real property unit</h3>

    <p><strong>Availability of Service:</strong> 8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Deed of Conveyance</li>
    <li>Title</li>
    <li>Real Property Tax Receipt paid including the quarter during the time of the transaction</li>
    <li>Transfer Tax Receipt</li>
    <li>Sworn Statement declaring the true and current market value of the property</li>
    <li>Certificate Authorizing Registration (CAR)</li>
    <li>One set documentary stamp if TD/DRPV is requested</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>    
<table id="clientActionTable">
<thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns employee to field inspection</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
    <td>Prepare Field Copy of Property Record Form (PRF)</td>
    <td>Assessment Clerk</td>
    <td>1 day/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Sketch location and boundaries on Field Copy of Property Record Form (FRPRF)</td>
    <td>Tax Mapper</td>
    <td>30 minutes/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
    <td>Assessment Clerk</td>
    <td>30 minutes/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Affix Assessment of Real Property (ARP) number</td>
    <td>Assessment Clerk</td>
    <td>30 minutes/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Evaluate documents submitted</td>
    <td>Assessment Clerk</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Asst. City Assessor recommends approval/disapproval of documents for processing</td>
    <td>Asst. City Assessor</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>City Assessor approves/disapproves for processing documents submitted</td>
    <td>City Assessor</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>If approved, documents are returned to respective zones for encoding of data, generation of TD/DRPV and NARP</td>
    <td>Assessment Clerk</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Documents are reviewed by LOGO-FIND Project personnel</td>
    <td>Administrative Assistant</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>Asst. City Assessor recommends approval/disapproval of documents</td>
    <td>Asst. City Assessor</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td></td>
    <td>City Assessor approves/disapproves documents submitted</td>
    <td>City Assessor</td>
    <td>2 hours/RPU</td>
</tr>
<tr>
    <td>Receive requested documents and NARP</td>
    <td>Release approved documents to client</td>
    <td>Assessment Clerk</td>
    <td>20 minutes/RPU</td>
</tr>
    </tbody>
</table>

    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(2)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(4)">Next</button></div>

<div id="sliderContent4">
    <h3>Segregation/Consolidation of Real Property Units</h3>
    <!-- Content for Segregation/Consolidation -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Blue print of the subdivision or consolidation plan duly approved by the Bureau of Lands</li>
    <li>Machine copy of the title or technical description of individual lots</li>
    <li>Machine copy of the real property tax receipt paid in full including the year of transaction</li>
    <li>One set documentary stamp for each RPU</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from deadline – a fine equivalent to ¾ of 1% of entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>    
<table id="clientActionTable">
<thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns employee to effect segregation</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>Assign Property Index Number (PIN)</td>
            <td>Tax Mapper</td>
            <td>1 minute/lot</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare Field Copy of Property Record Form (FCPRF), Property Record Form (PRF)</td>
            <td>LAOO</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Sketch location and boundaries on Field Copy of Property Record Form (FRPRF)</td>
            <td>Tax Mapper</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Rectify affected buildings</td>
            <td>LAOO</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Affix Assessment of Real Property (ARP) number</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Evaluate documents submitted</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/disapproval of documents for processing</td>
            <td>Asst. City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves/disapproves for processing documents submitted</td>
            <td>City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>If approved, documents are returned to respective zones for encoding of data, generation of TD/DRPV and NARP</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Documents are reviewed by LOGO-FIND Project personnel</td>
            <td>Administrative Assistant</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/disapproval of documents</td>
            <td>Asst. City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves/disapproves documents submitted</td>
            <td>City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td>Receive requested documents and NARP</td>
            <td>Release approved documents to client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>

    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(3)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(5)">Next</button></div>

<div id="sliderContent5">
    <h3>Cancellation of no longer existing buildings/machineries</h3>
    <!-- Content for Cancellation -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Application for cancellation</li>
    <li>Certification from the Barangay Captain stating the date when the subject property was demolished, burned, or destroyed</li>
    <li>Machine copy of Real Property Tax Receipt paid, including the quarter when the event occurred</li>
    <li>Demolition permit from the City Engineer’s Office</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>    
<table id="clientActionTable">
<thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with a list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submits required documents</td>
            <td>Check and verify documents submitted and forwards to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns an employee to conduct field inspection</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>Conduct ocular inspection</td>
            <td>LAOO</td>
            <td>6 days/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare and submit a report of findings to the Division Chief</td>
            <td>LAOO</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief approves/disapproves the same</td>
            <td>Division Chief</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/disapproval of the transaction</td>
            <td>Asst. City Assessor</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>If approved, affix control of cancellation</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Cancel entry in Real Property Ownership Card (RPOC) and cancel Field Copy of Property Record Form (FCPRF)</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Data canceled on the computer</td>
            <td>Administrative Assistant</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td>Receive requested documents and NARP</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>


    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(4)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(6)">Next</button></div>

<div id="sliderContent6">
    <h3>Reclassification of Assessment</h3>
    <!-- Content for Reclassification -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Letter Request for reclassification of the owner</li>
    <li>Machine copy of Real Property Tax Receipt paid, including the year when the reclassification took place</li>
    <li>Zoning Ordinance that the subject property is within residential/commercial/industrial zone</li>
    <li>Clearance from the Department of Agrarian Reform that the subject property is not within the coverage of CARL</li>
    <li>Certificate from HLURB</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>
<table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inquire/apply/fill out request forms</td>
            <td>Provide client with a list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td></td>
            <td>Division Chief concerned reviews documents and assigns an employee to conduct a field inspection</td>
            <td>Division Chief</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>Conduct ocular inspection</td>
            <td>LAOO</td>
            <td>6 days/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare and submit a report of findings to the Division Chief</td>
            <td>LAOO</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>If approved, prepare Field Copy of Property Record Form</td>
            <td>LAOO Assessment</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Sketch location and boundaries of property</td>
            <td>Tax Mapper</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Record changes in the Tax Mapping Control Roll (TMCR)</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Affix Assessment of Real Property (ARP) number</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Staff evaluates documents submitted</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/ disapproval of documents for processing</td>
            <td>Asst. City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves /disapproves for processing documents submitted</td>
            <td>City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>If approved, documents are returned to respective zones for encoding of data, generation of TD/DRPV and NARP</td>
            <td>Assessment Clerk</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Documents are reviewed by LOGO-FIND Project personnel</td>
            <td>Administrative Assistant</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Asst. City Assessor recommends approval/disapproval of documents</td>
            <td>Asst. City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>City Assessor approves/disapproves documents submitted</td>
            <td>City Assessor</td>
            <td>2 hours/RPU</td>
        </tr>
        <tr>
            <td>Receive requested documents and NARP</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>


    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(5)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(7)">Next</button></div>

<div id="sliderContent7">
    <h3>Issuance of Declaration of Real Property Value (DRPV) – Tax Declaration (TD)</h3>
    <!-- Content for Issuance of DRPV-TD -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Machine copy of Real Property Tax Receipt paid, including the quarter the transaction is being made</li>
    <li>Receipt of late filing of Sworn Statement penalty, if any</li>
    <li>One set documentary stamp</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Tax Declaration (TD)/Declaration of Real property Value (DRPV) fee – P100.00</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>
<table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Request for a copy of Declaration of Real Property Value (DRPV) – Tax Declaration</td>
            <td>Provide the client with a list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
        <td></td>
            <td>Property Record Form (PRF) is retrieved from files by office staff</td>
            <td>Assessment Clerk</td>
            <td>1 hour/property owner</td>
        </tr>
        <tr>
            <td></td>
            <td>Prepare Declaration of Real Property Value (DRPV) – Tax Declaration (TD)</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td></td>
            <td>Review and correct prepared DRPV-TD</td>
            <td>LAOO</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td></td>
            <td>Approve and sign prepared DRPV-TD</td>
            <td>City Assessor, Asst. City Assessor, LAOO IV, LAOO III</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td>Receive requested documents</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>

    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(6)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(8)">Next</button></div>

<div id="sliderContent8">
    <h3>Issuance of Certification on Aggregate Landholdings</h3>
    <!-- Content for Certification on Aggregate Landholdings -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Machine copy of Real Property Tax Receipt, including the quarter the transaction is being made</li>
    <li>Receipt of late filing of Sworn Statement penalty, if any</li>
    <li>One set documentary stamp</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Certification Fee – P100.00</li>
    <li>Verification Fee – P20.00 per RPU but a minimum of P60.00 and a maximum of P500.00 depending on the number of Real Property Units</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>
<table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Request for issuance of certification</td>
            <td>Provide the client with a list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit required documents</td>
            <td>Check and verify documents submitted and forward to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
        <td></td>
            <td>Verify properties</td>
            <td>Assessment Clerk</td>
            <td>1 hour/property owner</td>
        </tr>
        <tr>
        <td></td>
            <td>Retrieve Property Record Forms (PRF/s) from storeroom</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
        <td></td>
            <td>Prepare certification</td>
            <td>Assessment Clerk</td>
            <td>1 hour</td>
        </tr>
        <tr>
        <td></td>
            <td>Review and correct prepared certification</td>
            <td>LAOO IV, LAOO III, Assessment Clerk</td>
            <td>1 hour</td>
        </tr>
        <tr>
        <td></td>
            <td>Approve/disapprove certification</td>
            <td>City Assessor, Asst. City Assessor, LAOO IV, LAOO III</td>
            <td>20 minutes</td>
        </tr>
        <tr>
            <td>Receive approved certification</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>

    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(7)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(9)">Next</button></div>

    
<div id="sliderContent9">
    <h3>Issuance of Certification of No Real Property</h3>
    <!-- Content for Certification on Aggregate Landholdings -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>One set documentary stamp</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Certification Fee – P100.00</li>
    <li>Verification Fee – P20.00 per RPU but a minimum of P60.00 and a maximum of P500.00 depending on the number of Real Property Units</li>
</ul>

<h3>How to Avail</h3>
<table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Request for issuance of certification</td>
            <td>Verify properties</td>
            <td>Assessment Clerk</td>
            <td>1 hour</td>
        </tr>
        <tr>
            <td>Submit receipts for fees required</td>
            <td>Prepare certification</td>
            <td>Assessment Clerk</td>
            <td>1 hour</td>
        </tr>
        <tr>
        <td></td>
            <td>Review and correct prepared certification</td>
            <td>LAOO IV, LAOO III, Assessment Clerk</td>
            <td>1 hour</td>
        </tr>
        <tr>
        <td></td>
            <td>Approve/disapprove certification</td>
            <td>City Assessor, Asst. City Assessor, LAOO IV, LAOO III</td>
            <td>30 minutes/RPU</td>
        </tr>
        <tr>
            <td>Receive approved certification</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>30 minutes/RPU</td>
        </tr>
    </tbody>
</table>


    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(8)">Previous</button>
    <button class="btn btn-primary" class="navigation-btn" onclick="showSliderContent(10)">Next</button></div>

<div id="sliderContent10">
    <h3>Issuance of Certification (With/No Improvement)</h3>
    <!-- Content for Certification (With/No Improvement) -->
    <p><strong>Availability of Service:</strong><br>8:00am – 5:00pm; No noon break</p>

<p><strong>Forms / Requirements:</strong></p>
<ul>
    <li>Machine copy of Real Property Tax Receipt/s including the quarter the transaction is being made</li>
    <li>Receipt of late filing of Sworn Statement penalty, if any</li>
    <li>One set documentary stamp</li>
</ul>

<p><strong>Fees:</strong></p>
<ul>
    <li>Certification Fee – P100.00</li>
    <li>Verification Fee – P20.00 per RPU but a minimum of P60.00 and a maximum of P500.00 depending on the number of Real Property Units</li>
</ul>

<p><strong>Late filing fee, if any:</strong></p>
<ul>
    <li>If the sworn declaration is filed within 30 days from the deadline – P50.00</li>
    <li>If the sworn declaration is not filed within 30 days from the deadline – a fine equivalent to ¾ of 1% of the entire assessed value of his property located in the city in addition to the standard fine of P50.00; provided, however, that the standard and additional fines together shall in no case be less than P100.00 nor more than P3,000.00</li>
</ul>

<h3>How to Avail</h3>
<table id="clientActionTable">
    <thead>
        <tr>
            <th>Client Action</th>
            <th>LGU Action</th>
            <th>Responsible Person/Office</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Request for issuance of certification</td>
            <td>Provide client with a list of requirements</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
            <td>Submit receipts for fees required</td>
            <td>Check and verify documents submitted and forwards them to the Division Chief</td>
            <td>Officers-of-the-day</td>
            <td>30 minutes</td>
        </tr>
        <tr>
        <td></td>
            <td>Retrieve record from storeroom and verify properties</td>
            <td>Assessment Clerk</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
        <td></td>
            <td>Prepare certification</td>
            <td>Assessment Clerk</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
        <td></td>
            <td>Review and correct prepared certification</td>
            <td>LAOO IV, LAOO III, Assessment Clerk</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
        <td></td>
            <td>Approve/disapprove certification</td>
            <td>City Assessor, Asst. City Assessor, LAOO IV, LAOO III</td>
            <td>1 hour/RPU</td>
        </tr>
        <tr>
            <td>Receive approved documents</td>
            <td>Release approved documents to the client</td>
            <td>Assessment Clerk</td>
            <td>20 minutes/RPU</td>
        </tr>
    </tbody>
</table>

<br>

    <button class="btn btn-success" class="navigation-btn" onclick="showSliderContent(9)">Previous</button>
</div>
<script>
    function showSliderContent(sliderNumber) {
        for (let i = 1; i <= 10; i++) {
            document.getElementById(`sliderContent${i}`).style.display = 'none';
        }
        
        if (sliderNumber === 1) {
            document.getElementById('sliderContent1').style.display = 'block';
        } else if (sliderNumber === 10) {
            document.getElementById('sliderContent10').style.display = 'block';
        } else {
            document.getElementById(`sliderContent${sliderNumber}`).style.display = 'block';
        }
    }
</script>

<br>

<?php
include('user_include/scripts.php');
include('user_include/footer.php');
?>
