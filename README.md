*Know Your User: Open source user analytics for sovereign cybersecurity.*

<p align="center">
    <a href="https://www.tirreno.com/" target="_blank">
        <img src="https://www.tirreno.com/double-screen.jpg" alt="Tirreno screenshot" />
    </a>
</p>
---

Tirreno is a open-source user analytics.

Tirreno is a universal security tool designed to protect online platforms, SaaS applications, online communities, intranets, IoT, e-commerce websites, and internal web portals from various threats related to user activity. It is effective against external threats associated with partners or customers, as well as internal risks posed by employees or suppliers.

Tirreno is a "low-tech" PHP and PostgreSQL software application that can be downloaded and installed on your own web server. After a straightforward five-minute installation process, you can immediately access real-time analytics.

## Requirements

* **PHP**: Version 8.0 to 8.3
* **PostgreSQL**: Version 12 or greater
* **PHP Extensions**: `PDO_PGSQL`
* **HTTP Web Server**: Any, configured to work with PHP
* **Operating System**: A Unix-like system is recommended
* **Minimum Hardware Requirements**:
    * **PostgreSQL**: 512 MB RAM (2 GB recommended)
    * **Application**: 512 MB RAM (1 GB recommended)
    * **Storage**: Approximately 1 GB PostgreSQL storage per 1 million events

If you prefer Apache web server, `mod_rewrite` and `mod_headers` should be enabled.

## Install instruction

1. [Download](https://www.tirreno.com/download.php) latest version of tirreno (ZIP file).
2. Extract the tirreno-master.zip file to the location where you want it installed on your web server.
3. Navigate to `http://your-domain.example/install/index.php` in browser to launch installation process.
4. After the successful installation, delete the `install/` directory and its contents.
5. Navigate to `http://your-domain.example/signup/` in browser to create administratior account.
6. For cron jobs setup insert the following schedule (every 10 minutes) expression with `crontab -e` command or by editing `/var/spool/cron/your-web-server` file:
```
*/10 * * * * cd /path/to/tirreno && /usr/bin/php /path/to/tirreno/index.php /cron >> /path/to/tirreno/logs/error.log 2>&1
```

## Optional non-free capabilities

The open-sourced Tirreno code is intended to be used for free as a standalone application. It provides general statistics and an extended audit log of user requests to a monitored system. As is, this tooling may be sufficient for bringing insights about user activity and behavioral patterns in a wide range of use cases, especially as a solution for small and medium-sized organizations.

However, if you are looking to cover more advanced usage scenarios as frud prevention, the additional Tirreno API enrichment capabilities can be enabled via [monthly-paid subscription](https://www.tirreno.com/pricing/).

### Enrichment API

As the solution we built has proved to be efficient in guarding our platform, over time we have implemented a data enrichment API. The goal was to provide our partners and clients with ethical means in their struggle against malicious actors.

We have built the Tirreno API in-house, eliminating the need to share information with third parties. It operates without collecting or storing user data.

Along with making Tirreno's code publicly available, we provide access to this API on a monthly subscription basis. Depending on the subscription plan, it supplies extended information on any of the following: IP address, email address, domain, and phone number. Enabling all the data enrichment types augments Tirreno into a fully-fledged enterprise solution for an online fraud prevention system.

## Background

The business behind this platform is Tirreno Technologies Sàrl, operated in Vaud (Switzerland). It is a privately owned, for-profit company with no venture capital involved. The Tirreno project started as a proprietary system in 2021 and was open-sourced (AGPL) in December 2024.

The idea for Tirreno arose from a challenge: an online platform was in need of a fraud prevention tool. We were looking for a product that could work on-premises and would not share user data with third-party vendors. Since the available solutions did not meet all our requirements, we created our own tool.

While building Tirreno, we concentrated on privacy, trust, and true sovereignty. As a result, we have built Tirreno in a secure and independent manner. The application does not have a long list of development dependencies, nor does it rely on heavy frameworks. This approach minimizes the potential attack surface.

### Why the name Tirreno?

History suggests the Tyrrhenian people may have lived in Tuscany and eastern Switzerland as far back as the 10th-9th centuries BC. The term "Tyrrhenian” became more commonly associated with the Etruscans, and it is from them that the Tyrrhenian Sea derives its name — a name still in use today. This name is believed to be an exonym, possibly meaning “tower”.

While working on the logo, we conducted our own historical study and traced mentions of 'tirreno' back to the 15th-century printed edition of the Vulgate (the Latin Bible). We kept it lowercase to stay true to the original — quite literally, by the book.

Finally, the "Tirreno" wordmark is cropped at the bottom, creating a horizon line that symbolizes the continuous development cycle of cybersecurity software.

## Reporting a security issue

If you've found a security-related issue with Tirreno, please email security@tirreno.com. Submitting the issue on GitHub exposes the vulnerability to the public, making it easy to exploit. We will publicly disclose the security issue after it has been resolved.

After receiving a report, Tirreno will take the following steps:

- Confirm that the report has been received and is being addressed.
- Attempt to reproduce the problem and confirm the vulnerability.
- Release new versions of all the affected packages.
- Announce the problem prominently in the release notes.
- If requested, give credit to the reporter.

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License (AGPL) as published by the Free Software Foundation version 3.

The name "Tirreno" is a registered trademark of Tirreno Technologies Sàrl, and Tirreno Technologies Sàrl hereby declines to grant a trademark license to "Tirreno" pursuant to the GNU Affero General Public License version 3 Section 7(e), without a separate agreement with Tirreno Technologies Sàrl.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along with this program. If not, see [GNU Affero General Public License v3](https://www.gnu.org/licenses/agpl-3.0.txt).
