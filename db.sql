-- Table muoms
DROP TABLE IF EXISTS `muoms`;
CREATE TABLE IF NOT EXISTS `muoms` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table mgrps
DROP TABLE IF EXISTS `mgrps`;
CREATE TABLE IF NOT EXISTS `mgrps` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table mwhses
DROP TABLE IF EXISTS `mwhses`;
CREATE TABLE IF NOT EXISTS `mwhses` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	, location				VARCHAR(128)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table mbanks
DROP TABLE IF EXISTS `mbanks`;
CREATE TABLE IF NOT EXISTS `mbanks` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	, note					VARCHAR(256)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table msupps
DROP TABLE IF EXISTS `msupps`;
CREATE TABLE IF NOT EXISTS `msupps` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	, address				VARCHAR(128)
	, npwp					VARCHAR(128)
	, cp					VARCHAR(128)
	, phone					VARCHAR(128)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table mitems
DROP TABLE IF EXISTS `mitems`;
CREATE TABLE IF NOT EXISTS `mitems` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(256)
	, code_muom				VARCHAR(128)
	, price					decimal(19,6)
	, price2				decimal(19,6)
	, code_mgrp				VARCHAR(128)
	, code_mwhse			VARCHAR(128)
	, admin_id				INT
	, note					VARCHAR(256)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table mcusts
DROP TABLE IF EXISTS `mcusts`;
CREATE TABLE IF NOT EXISTS `mcusts` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, code					VARCHAR(128) 
	, name					VARCHAR(128)
	, address				VARCHAR(128)
	, npwp					VARCHAR(128)
	, cp					VARCHAR(128)
	, phone					VARCHAR(128)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table tposhs
DROP TABLE IF EXISTS `tposhs`;
CREATE TABLE IF NOT EXISTS `tposhs` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, no					VARCHAR(128)
	, tdt					datetime DEFAULT NULL
	, code_mcust			VARCHAR(128)
	, disc					decimal(19,6)
	, tax					decimal(19,6)
	, grdtotal				decimal(19,6)
	, note					VARCHAR(256)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Table tposhds
DROP TABLE IF EXISTS `tposhds`;
CREATE TABLE IF NOT EXISTS `tposhds` (
	id 						INT(11) NOT NULL AUTO_INCREMENT
	, idh					INT
	, no_tposh				VARCHAR(128)
	, code_mitem			VARCHAR(128)
	, qty					decimal(19,6)
	, code_muom				VARCHAR(128)
	, disc					decimal(19,6)
	, tax					decimal(19,6)
	, price					decimal(19,6)
	, subtotal				decimal(19,6)
	, note					VARCHAR(256)
	-- ######################################
	, created_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at 				TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	, deleted_at				datetime DEFAULT NULL
	, PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;